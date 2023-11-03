import {createApp} from "vue";
import ElementPlus from "element-plus";
import axios from 'axios';

import "element-plus/dist/index.css";
import "element-plus/theme-chalk/dark/css-vars.css";

import App from "./App.vue";

window.axios = axios;
const app = createApp(App);
import {store} from "./store/index.js";
import {router} from "./router/index.js";

app.use(ElementPlus)
    .use(router)
    .use(store)
    .mount("#app");
