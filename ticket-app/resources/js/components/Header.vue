<template>
    <el-header class="app-header">
        <el-menu
            mode="horizontal"
            @select="handleMenuSelect"
            :ellipsis="false">
            <template v-for="(menuItem,index) in menuItems">
                <el-menu-item v-if="!menuItem.subMenuItems.length" :index="`${index}`">
                    {{ menuItem.title }}
                </el-menu-item>
                <el-sub-menu v-else :index="`${index}`">
                    <template #title>{{ menuItem.title }}</template>
                    <el-menu-item v-for="(subMenuItem,subMenuIndex) in menuItem.subMenuItems"
                                  :index="`${index}-${subMenuIndex}`">
                        {{ subMenuItem.title }}
                    </el-menu-item>
                </el-sub-menu>
            </template>
            <div style="flex-grow: 1"/>
            <el-menu-item index="login" class="app-header__logo">
                <span class=""> User name </span>
                <el-avatar
                    shape="square"
                    size="default"
                    src="https://cube.elemecdn.com/0/88/03b0d39583f48206768a7534e55bcpng.png"
                />
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
        handleMenuSelect(key) {
            console.log(this.getMenuItemLink(key))
            this.$router.push(this.getMenuItemLink(key));
        },
        getMenuItemLink(rawKeys) {
            let splitKeys = rawKeys.split('-');

            if (splitKeys.every(keyItem => !isNaN(keyItem))) {
                return splitKeys.reduce((accum, key) => {
                    return accum[key]?.subMenuItems?.length ? accum[key].subMenuItems : accum[key];
                }, this.menuItems).link;
            }

            return rawKeys;
        }
    }
};
</script>

<style lang="scss" scoped>
.app-header {
    &__logo {
        gap: 24px;
    }
}
</style>
