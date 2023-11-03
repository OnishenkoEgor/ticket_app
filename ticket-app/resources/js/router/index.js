import {createRouter, createWebHistory} from "vue-router";
import {routes} from "./routes.js";
import {store} from "../store/index.js";
import {ElLoading} from "element-plus";

const router = createRouter({
    history: createWebHistory(),
    routes,
});

router.beforeEach(async (to, from, next) => {
    if (!store.getters.isInitialized) {
        const loading = ElLoading.service({
            lock: true,
            text: 'Loading...',
            background: 'rgba(255,255,255, 1)',
        });
        await store.dispatch('init').then(() => {
            if (to.meta.requiresAuth && !store.getters.isAuthenticated) {
                next({name: 'login', query: {to: to.fullPath}, replace: true});
            } else {
                next();
            }
            loading.close();
        })
    } else {
        if (to.meta.requiresAuth && !store.getters.isAuthenticated) {
            next({name: 'login', query: {to: to.fullPath}, replace: true});
        } else {
            next();
        }
    }
})

export {
    router
}
