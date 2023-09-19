<template>
    <el-row>
        <el-col :span="16" :offset="4">
            <div>
                <h1>Login page</h1>
                <AuthForm>
                </AuthForm>
            </div>
        </el-col>
    </el-row>
</template>
<script>
import AuthForm from "../components/AuthForm.vue";

export default {
    name: "Login",
    components: {AuthForm},
}
</script>

<style scoped lang="scss">

</style>
