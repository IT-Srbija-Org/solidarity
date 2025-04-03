import CrudPage from "https://skeletor.greenfriends.systems/skeletorjs/src/Page/CrudPage.js";
import Loader from "https://skeletor.greenfriends.systems/skeletorjs/src/Loader/Loader.js";

export default class Educator extends CrudPage {
    #data;
    #formTabs;
    #formAction;
    modalConfig = {
        width: '100%',
        height:'100%'
    }

    actionFilter = (action, entity) => {
        const role = document.getElementById('navigation').dataset.role;
        if (action.getName() === 'delete' && role != 1) {
            return false;
        }
        return action;
    }

    tdStyler = (td, columnName, columnValue, entity) => {
        if (columnName === 'delegateVerified') {
            switch (columnValue) {
                case 'Yes':
                    this.makeTDValueToBadge(td, columnValue, CrudPage.BADGE_TYPES.GREEN);
                    break;
                case 'No':
                    this.makeTDValueToBadge(td, columnValue, CrudPage.BADGE_TYPES.RED);
                    break;
            }
        }
        return td;
    }

}