<template>
    <div class="common-layout">
        <Header />
        <el-main>
            <router-view></router-view>
        </el-main>
        <Footer />
    </div>
</template>

<script setup>
import Header from "./components/Header.vue";
import Footer from "./components/Footer.vue";
</script>
<style scoped>
p {
    color: black;
}
</style>
