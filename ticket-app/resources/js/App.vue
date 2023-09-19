<template>
    <div class="common-layout">
        <Header/>
        <el-main>
            <router-view></router-view>
        </el-main>
        <Footer/>
    </div>
</template>

<script>
import Header from "./components/Header.vue";
import Footer from "./components/Footer.vue";

export default {
    components: {
        Header,
        Footer
    },
    created() {
        //todo refactor to store
        console.log(this.$store.state);
        if (!this.$store.state.user) {
            axios.get('/api/current-user').then(({data: {user}}) => {
                this.$store.commit({
                    type: 'setUserName',
                    user
                })
            })
        }
    }
}
</script>
<style lang="scss" scoped>

* {
    font-family: 'Helvetica Neue', Helvetica, 'PingFang SC', 'Hiragino Sans GB', 'Microsoft YaHei', '微软雅黑', Arial, sans-serif;
}
</style>
