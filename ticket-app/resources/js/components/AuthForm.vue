<template>
    <el-form label-position="top" :size="'large'">
        <el-form-item label="Email">
            <el-input v-model="email"></el-input>
        </el-form-item>
        <el-form-item label="Password">
            <el-input v-model="password"></el-input>
        </el-form-item>
        <el-button type="primary" @click="login">Login</el-button>
    </el-form>
</template>
<script>
export default {
    name: "AuthForm",
    data() {
        return {
            email: '',
            password: ''
        }
    },
    methods: {
        login() {
            axios.post('api/login', {
                email: this.email,
                password: this.password
            }).then(() => {
                this.$message({
                    type: "success",
                    message: "Login success."
                });
            }).catch(({response: {data: {message}}}) => {
                this.$message({
                    type: 'error',
                    message: message ?? 'Error on login.'
                });
            });
        }
    }
}
</script>
<style scoped lang="scss">

</style>
