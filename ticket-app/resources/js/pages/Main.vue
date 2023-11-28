<template>
    <Breadcrumbs/>
    <div v-if="$route.name === 'main'">
        <h1>its page main</h1>
    </div>
    <router-view v-else></router-view>
</template>

<script>
import Breadcrumbs from "../components/Breadcrumbs.vue";

export default {
    components: {Breadcrumbs}
};
</script>

<style></style>
