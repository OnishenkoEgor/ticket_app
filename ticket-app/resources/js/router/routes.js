import Main from "../pages/Main.vue";
import Users from "../pages/user/Users.vue";
import Login from "../pages/Login.vue";
import UserForm from "../pages/user/UserForm.vue";
import UserCard from "../pages/user/UserCard.vue";
import Tickets from "../pages/ticket/Tickets.vue";
import userApi from '../api/user.js'
import Destinations from "../pages/destinations/Destinations.vue";

const routes = [
    {
        path: "/",
        name: 'main',
        component: Main,
        meta: {
            pageTitle: 'Home',
        },
        children: [
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
                        path: ":id/show",
                        name: 'users.get',
                        component: UserCard,
                        meta: {
                            pageTitleCb: userApi.getUserName
                        }
                    },
                    {
                        path: "create",
                        name: 'users.create',
                        component: UserForm,
                        meta: {
                            pageTitle: 'Create user'
                        },
                    },
                    {
                        path: ":id/edit",
                        name: 'users.update',
                        component: UserForm,
                        meta: {
                            pageTitleCb: userApi.getUserName
                        }
                    }
                ]
            },
            {
                path: '/tickets',
                name: 'tickets',
                component: Tickets,
                meta: {
                    pageTitle: 'Tickets'
                }
            },
            {
                path: '/destinations',
                name: 'destinations',
                component: Destinations,
                meta: {
                    pageTitle: 'Destinations'
                }
            },
            {
                path: '/login',
                name: 'login',
                component: Login,
                meta: {
                    pageTitle: 'Login'
                }
            }
        ]
    },

];
export {
    routes
}
