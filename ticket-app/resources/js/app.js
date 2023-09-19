import {createApp} from "vue";
import ElementPlus from "element-plus";
import {createRouter, createWebHistory} from "vue-router";
import {createStore} from "vuex";
import axios from 'axios';

import "element-plus/dist/index.css";
import "element-plus/theme-chalk/dark/css-vars.css";

import App from "./App.vue";
import Main from "./pages/Main.vue";
import AboutUs from "./pages/AboutUs.vue";
import Login from "./pages/Login.vue";
import Users from "./pages/Users.vue";

const routes = [
    {path: "/", name: 'main', component: Main},
    {path: "/users", name: 'users', component: Users},
    {path: "/about-us", name: 'about-us', component: AboutUs},
    {path: '/login', name: 'login', component: Login}
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

router.beforeEach((to, from, next) => {
    console.log(isAuthenticated());
    if (to.name === 'users' && !isAuthenticated()) {
        next({name: 'login'});
    } else {
        next();
    }
})

function isAuthenticated() {
    return false;
}

const store = createStore({
    state() {
        return {
            userName: null
        }
    },
    getters: {
        getUserName(state) {
            return state.userName;
        }
    },
    mutations: {
        setUserName(state, user) {
            console.log(user)
            state.userName = user;
        }
    }
});

window.axios = axios;
const app = createApp(App);

app.use(ElementPlus)
    .use(router)
    .use(store)
    .mount("#app");
