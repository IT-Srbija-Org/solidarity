import CrudPage from "https://skeletor.greenfriends.systems/skeletorjs/src/Page/CrudPage.js";

const pagesDirectory = './pages';
const pageIdentifier = document.getElementById('main').getAttribute('data-page');

const configDirectory = './config';
window.pageConfig = {};
import(`${configDirectory}/config.js`).then(({config: pageConfig}) => {
    window.pageConfig = pageConfig;
}).catch((e) => {
    console.error(e);
    console.error('No page config found.');
});
if(pageIdentifier) {
    const version = '0.0.1';
    import(`${pagesDirectory}/${pageIdentifier}.js?v=${version}`).then(({default: Page}) => {
        try {
            const page = new Page();
            page.init();
        } catch (e) {
            console.error(`Error initializing ${pageIdentifier} page.`);
            console.error(e);
        }
    }).catch((e) => {
        console.error(e);
        if(e.message.includes('Failed to fetch dynamically imported module')) {
            console.info(`Could not resolve page  "${pagesDirectory}/${pageIdentifier}.js". Using default page.`);
            const page = new CrudPage();
            page.init();
        }
    })
} else {
    try {
        const page = new CrudPage();
        page.init();
    } catch (e) {
        console.error('Error initializing default page.');
        console.error(e);
    }
}