import CrudPage from "https://skeletor.greenfriends.systems/skeletorjs/src/Page/CrudPage.js";
import Loader from "https://skeletor.greenfriends.systems/skeletorjs/src/Loader/Loader.js";

export default class Donor extends CrudPage {
    #data;
    #formTabs;
    #formAction;
    modalConfig = {
        width: '100%',
        height:'100%'
    }

    onFormReady(data) {
        if (data.action === 'edit') {
            this.#data = data;
            this.#formAction = data.action;
        }
    }

}