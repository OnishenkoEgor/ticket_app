<template>
    <div class="common-layout">
        <Header/>
        <el-main>
            <router-view></router-view>
        </el-main>
        <Footer/>
    </div>
</template>

<script setup>
import Header from "./components/Header.vue";
import Footer from "./components/Footer.vue";
</script>
<style lang="scss" scoped>

* {
    font-family: 'Helvetica Neue', Helvetica, 'PingFang SC', 'Hiragino Sans GB', 'Microsoft YaHei', '微软雅黑', Arial, sans-serif;
}
</style>
