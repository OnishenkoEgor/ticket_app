<template>
    <el-aside>
        <el-menu
            :router="true"
            :ellipsis="false"
            style="min-height: 100vh"
        >
            <el-sub-menu v-if="user" :teleported="true" index="login" class="app-header__logo">
                <template #title>
                    <span class=""> {{ user.name }} </span>
                </template>
                <el-menu-item @click="logout">
                    Logout
                </el-menu-item>
            </el-sub-menu>
            <el-menu-item index="9-9" v-else route="login">
                Login
            </el-menu-item>
            <template v-for="(menuItem,index) in menuItems">
                <el-menu-item v-if="!menuItem.subMenuItems.length" :index="`${index}`" :route="menuItem.link">
                    {{ menuItem.title }}
                </el-menu-item>
                <el-sub-menu v-else :index="`${index}`">
                    <template #title>{{ menuItem.title }}</template>
                    <el-menu-item v-for="(subMenuItem,subMenuIndex) in menuItem.subMenuItems"
                                  :index="`${index}-${subMenuIndex}`"
                                  :route="subMenuItem.link"
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
                    link: '/',
                    subMenuItems: []
                },
                {
                    title: 'Users',
                    link: '/users',
                    subMenuItems: []
                },
                {
                    title: 'second',
                    link: '',
                    subMenuItems: [
                        {
                            title: 'second-1',
                            link: '/second-1'
                        },
                        {
                            title: 'second-2',
                            link: '/second-2'
                        },
                        {
                            title: 'second-3',
                            link: '/second-3'
                        }
                    ]
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
        ...mapActions(['init'])
    },
    computed: {
        ...mapGetters({user: 'getUser'})
    }
}
</script>


<style scoped lang="scss">

</style>
