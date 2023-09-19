<template>
    <el-header class="app-header">
        <el-menu
            mode="horizontal"
            :router="true"
            :ellipsis="false">
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
            <div style="flex-grow: 1"/>
            <el-sub-menu v-if="user" index="login" class="app-header__logo">
                <template #title>
                    <span class=""> {{ user }} </span>
                </template>
                <el-menu-item @click="logout">
                    Logout
                </el-menu-item>
            </el-sub-menu>
            <el-menu-item index="9-9" v-else route="login">
                Login
            </el-menu-item>
        </el-menu>
    </el-header>
</template>

<script>
export default {
    name: "Header",
    data() {
        return {
            menuItems: [
                {
                    title: 'Users',
                    link: 'users',
                    subMenuItems: []
                },
                {
                    title: 'second',
                    link: '',
                    subMenuItems: [
                        {
                            title: 'second-1',
                            link: 'second-1'
                        },
                        {
                            title: 'second-2',
                            link: 'second-2'
                        },
                        {
                            title: 'second-3',
                            link: 'second-3'
                        }
                    ]
                }
            ]
        }
    },
    methods: {
        logout() {
            axios.get('api/logout').then(res => {
                //todo remove user from store
            })
        }
    },
    computed: {
        user() {
            return this.$store.getters.getUser();
        }
    }
};
</script>

<style lang="scss" scoped>

</style>
