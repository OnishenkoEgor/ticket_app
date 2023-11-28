import {createRouter, createWebHistory} from "vue-router";
import {routes} from "./routes.js";
import {store} from "../store/index.js";
import {ElLoading} from "element-plus";

const router = createRouter({
    history: createWebHistory(),
    routes,
});

router.beforeEach(async (to, from) => {
    if (!store.getters['auth/isInitialized']) {
        const loading = ElLoading.service({
            lock: true,
            text: 'Loading...',
            background: 'rgba(255,255,255, 1)',
        });
        await store.dispatch('auth/init').then(() => {
            loading.close();
            if (to.meta.requiresAuth && !store.getters['auth/isAuthenticated']) {
                return {name: 'login', query: {to: to.fullPath}};
            }
        })
    } else {
        if (to.meta.requiresAuth && !store.getters['auth/isAuthenticated']) {
            return {name: 'login', query: {to: to.fullPath}};
        }
    }
})

export {
    router
}
