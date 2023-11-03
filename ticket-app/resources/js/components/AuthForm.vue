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
import auth from '../api/auth.js';

export default {
    name: "AuthForm",
    props: {
        successCb: {
            type: Function,
            required: false,
            default: () => {
            }
        },
        failCb: {
            type: Function,
            required: false,
            default: () => {
            }
        }
    },
    data() {
        return {
            email: 'test@test.test',
            password: 'test'
        }
    },
    methods: {
        login() {
            auth.login({
                email: this.email,
                password: this.password
            }).then(() => {
                this.$message({
                    type: "success",
                    message: "Login success.",
                    onClose: this.successCb()
                });
            }).catch(({response: {data: {message}}}) => {
                this.$message({
                    type: 'error',
                    message: message ?? 'Error on login.',
                    onClose: this.failCb
                });
            });
        }
    },
}
</script>
<style scoped lang="scss">

</style>
