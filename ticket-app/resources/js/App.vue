<template>
    <el-container>
        <Aside/>
        <el-main>
            <Header/>
            <router-view></router-view>
        </el-main>
    </el-container>
</template>

<script>
import Header from "./components/Header.vue";
import Aside from "./components/Aside.vue";
import {mapActions, mapGetters} from "vuex";

export default {
    components: {
        Header,
        Aside
    },
    methods: {
        ...mapActions([
            'init'
        ])
    },
    computed: {
        ...mapGetters([
            'isAuthenticated'
        ])
    },
    created() {
        if (!this.isAuthenticated) {
            this.init();
        }
    },
}
</script>
<style lang="scss" scoped>

* {
    font-family: 'Helvetica Neue', Helvetica, 'PingFang SC', 'Hiragino Sans GB', 'Microsoft YaHei', '微软雅黑', Arial, sans-serif;
}
</style>
