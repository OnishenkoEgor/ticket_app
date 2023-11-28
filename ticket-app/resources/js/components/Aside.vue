<template>
    <el-aside>
        <el-menu
            ref="menu"
            :router="true"
            :ellipsis="false"
            :default-active="defaultActive"
            style="min-height: 100vh"
        >
            <el-sub-menu v-if="user" :teleported="true" index="0" class="app-header__logo">
                <template #title>
                    <span class=""> {{ user.name }} </span>
                </template>
                <el-menu-item @click="logout">
                    Logout
                </el-menu-item>
            </el-sub-menu>
            <el-menu-item index="0" v-else route="login" ref="login">
                Login
            </el-menu-item>
            <template v-for="(menuItem,index) in menuItems">
                <el-menu-item v-if="!menuItem.subMenuItems.length" :index="`${++index}`"
                              :route="$router.resolve({name: menuItem.link}).fullPath">
                    {{ menuItem.title }}
                </el-menu-item>
                <el-sub-menu v-else :index="`${index}`">
                    <template #title>{{ menuItem.title }}</template>
                    <el-menu-item v-for="(subMenuItem,subMenuIndex) in menuItem.subMenuItems"
                                  :index="`${index}-${subMenuIndex}`"
                                  :route="$router.resolve({name: subMenuItem.link}).fullPath"
                    >
                        {{ subMenuItem.title }}
                    </el-menu-item>
                </el-sub-menu>
            </template>
        </el-menu>
    </el-aside>
</template>
<script>
import auth from "../api/auth.js";
import {mapActions, mapGetters} from "vuex";

export default {
    name: "Aside",
    data() {
        return {
            menuItems: [
                {
                    title: 'Main',
                    link: 'main',
                    subMenuItems: []
                },
                {
                    title: 'Users',
                    link: 'users',
                    subMenuItems: []
                },
                {
                    title: 'Tickets',
                    link: 'tickets',
                    subMenuItems: []
                }
            ]
        }
    },
    methods: {
        logout() {
            auth.logout().then(({errors}) => {
                if (!errors) {
                    this.init().then(() => {
                        if (this.$route.meta?.requiresAuth) {
                            this.$router.push({path: '/'});
                        }
                    });
                }
            });
        },
        ...mapActions({init: 'auth/init'})
    },
    computed: {
        defaultActive() {
            if (this.$route.name === 'login') {
                return String(0);
            }

            let index = this.menuItems.findIndex(item => {
                return item.link === this.$route.name
            });

            return index === -1 ? '' : String(++index);
        },
        ...mapGetters({user: 'auth/getUser'})
    },
    watch: {
        '$route'(to, from) {
            //TODO update active menu item after redirect in navigation guard
        }
    }
}
</script>


<style scoped lang="scss">

</style>
