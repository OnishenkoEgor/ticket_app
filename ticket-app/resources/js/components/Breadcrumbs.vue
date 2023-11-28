<template>
    <el-breadcrumb :separator-icon="arrowRight" style="padding-bottom: 24px">
        <el-breadcrumb-item v-for="item in items" :to="{path:item.path}">
            {{ item.name }}
        </el-breadcrumb-item>
    </el-breadcrumb>
</template>
<script>
import {ArrowRight} from '@element-plus/icons-vue'
import {shallowRef} from "vue";

export default {
    name: "Breadcrumbs",
    data() {
        let arrowRight = shallowRef(ArrowRight);

        return {
            arrowRight,
            items: []
        }
    },
    created() {
        this.updateItems()
    },
    methods: {
        updateItems() {
            this.items = [];
            this.$route.matched.forEach(async route => {
                if (route.meta.pageTitle) {
                    this.items.push({
                        name: route.meta.pageTitle,
                        path: route.path
                    })

                    return;
                }

                let title = await route.meta.pageTitleCb(this.$route.params.id)

                this.items.push({
                    name: title,
                    path: route.path
                });
            });
        }
    },
    watch: {
        '$route'() {
            this.updateItems()
        }
    }
}
</script>

<style scoped lang="scss">

</style>
