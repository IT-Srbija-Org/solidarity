import ToTop from "https://skeletor.greenfriends.systems/skeletorjs/src/ToTop/ToTop.js";
import Navigation from "https://skeletor.greenfriends.systems/skeletorjs/src/Navigation/Navigation.js";
import MediaLibrary from "https://skeletor.greenfriends.systems/skeletorjs/src/MediaLibrary/MediaLibrary.js";
import {theme as themeConfig} from "./theme.js";
import {modes} from "https://skeletor.greenfriends.systems/skeletorjs/src/Theme/modes.js";

const navigation = new Navigation({theme:themeConfig, defaultTheme: modes.light, isOpenOnInit: true});
navigation.init();

const toTop = new ToTop(document.getElementById('main') ?? null);
toTop.init();


window.mediaLibrary = new MediaLibrary();
window.mediaLibrary.init();