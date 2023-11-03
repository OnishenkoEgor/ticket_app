<template>
    <Breadcrumbs/>
    <h1 v-if="pageTitle">{{ pageTitle }}</h1>
</template>

<script>

import Breadcrumbs from "./Breadcrumbs.vue";

export default {
    name: "Header",
    components: {Breadcrumbs},
    data() {
        return {
            pageTitle: ''
        }
    },
    created() {
        this.pageTitle = this.$route.meta.pageTitle
    }
};
</script>

<style lang="scss" scoped>

</style>
