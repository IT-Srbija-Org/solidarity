import FormValidator from "https://skeletor.greenfriends.systems/skeletorjs/src/FormValidator/FormValidator.js";
import ToTop from "https://skeletor.greenfriends.systems/skeletorjs/src/ToTop/ToTop.js";
import Translator from "https://skeletor.greenfriends.systems/skeletorjs/src/Translator/Translator.js";
import {theme as themeConfig} from "./theme.js";
import ModeSelection from "https://skeletor.greenfriends.systems/skeletorjs/src/Theme/ModeSelection.js";
import {modes} from "https://skeletor.greenfriends.systems/skeletorjs/src/Theme/modes.js";

const modeSelection = new ModeSelection({
    modeToggleInput: null,
    theme: themeConfig,
    mode: modes.light
})
modeSelection.init();

const formValidator = new FormValidator({
    form: document.getElementById('loginForm'),
    formFieldClassNames: 'input',
});
formValidator.init();

const toTop = new ToTop(document.getElementById('main') ?? null);
toTop.init();


const passwordInput = document.querySelector('[type="password"]');
const passwordToggle = document.getElementById('togglePassword');
if(passwordInput && passwordToggle) {
    passwordToggle.addEventListener('click', () => {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        passwordToggle.classList.toggle('show');
        passwordToggle.title = type === 'password' ? Translator.translate('Show Password') : Translator.translate('Hide Password');
    });
}