<template>
    <el-row>
        <el-col :span="16" :offset="4">
            <div>
                <h1>Login page</h1>
                <AuthForm
                    :success-cb="successAuth">
                </AuthForm>
            </div>
        </el-col>
    </el-row>
</template>
<script>
import AuthForm from "../components/AuthForm.vue";
import {mapActions} from "vuex";

export default {
    name: "Login",
    components: {AuthForm},
    methods: {
        successAuth() {
            this.init().then(() => {
                if (this.$route.query?.to) {
                    this.$router.push({path: this.$route.query?.to});
                } else {
                    this.$router.push({path: '/'});
                }
            });
        },
        ...mapActions({init: 'auth/init'})
    }
}
</script>

<style scoped lang="scss">

</style>
