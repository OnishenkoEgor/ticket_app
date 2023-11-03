import Main from "../pages/Main.vue";
import Users from "../pages/user/Users.vue";
import AboutUs from "../pages/AboutUs.vue";
import Login from "../pages/Login.vue";
import UserForm from "../pages/user/UserForm.vue";
import UserCard from "../pages/user/UserCard.vue";

const routes = [
    {
        path: "/",
        name: 'main',
        component: Main,
        meta: {
            pageTitle: 'Main'
        }
    },
    {
        path: "/users",
        name: 'users',
        component: Users,
        meta: {
            requiresAuth: true,
            pageTitle: 'Users'
        },
        children: [
            {
                path: ":id",
                name: 'users.get',
                component: UserCard,
                meta: {
                    requiresAuth: true,
                    pageTitle: ''
                },
            },
            {
                path: "create",
                name: 'users.create',
                component: UserForm,
                meta: {
                    requiresAuth: true
                },
            },
            {
                path: "update",
                name: 'users.update',
                component: UserForm,
                meta: {
                    requiresAuth: true
                },
            }
        ]
    },
    {
        path: "/about-us",
        name: 'about-us',
        component: AboutUs
    },
    {
        path: '/login',
        name: 'login',
        component: Login,
    }
];
export {
    routes
}
