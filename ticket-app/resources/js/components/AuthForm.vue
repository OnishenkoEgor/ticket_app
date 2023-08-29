<template>
    <el-form>
        <el-form-item label="email">
            <el-input v-model="email"></el-input>
        </el-form-item>
        <el-form-item label="password">
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
            axios.get('/sanctum/csrf-cookie').then(response => {
                console.log(response);
            }).then(() => {
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
            }).catch(() => {
                console.log('Error on get csrf.')
            });
        }
    }
}
</script>
<style scoped lang="scss">

</style>
