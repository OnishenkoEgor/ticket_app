import { createApp } from 'vue'
import ElementPlus from 'element-plus'
import {createRouter,createWebHistory} from 'vue-router';

import 'element-plus/dist/index.css'

import App from './App.vue';
import Main from './pages/Main.vue';
import AboutUs from './pages/AboutUs.vue';

const routes=[
    {path:'/',component:Main},
    {path:'/about-us',component:AboutUs},
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});
const app = createApp(App);
app.use(ElementPlus)
    .use(router)
    .mount('#app');