import {createApp} from "vue";
import ElementPlus from "element-plus";
import {createRouter, createWebHistory} from "vue-router";
import axios from 'axios';

import "element-plus/dist/index.css";
import "element-plus/theme-chalk/dark/css-vars.css";

import App from "./App.vue";
import Main from "./pages/Main.vue";
import AboutUs from "./pages/AboutUs.vue";
import Login from "./pages/Login.vue";

const routes = [
    {path: "/", component: Main},
    {path: "/about-us", component: AboutUs},
    {path: '/login', component: Login}
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

window.axios = axios;
const app = createApp(App);
app.use(ElementPlus).use(router).mount("#app");
