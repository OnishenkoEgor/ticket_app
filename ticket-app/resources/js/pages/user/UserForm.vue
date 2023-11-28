<template>
    <el-form>
        <el-form-item label="Name">
            <el-input v-model="userData.name"></el-input>
        </el-form-item>
        <el-form-item label="Email">
            <el-input v-model="userData.email"></el-input>
        </el-form-item>
        <el-form-item label="Email">
            <el-input v-model="userData.password"></el-input>
        </el-form-item>
    </el-form>
</template>
<script>

export default {
    name: "UserForm",
    props: {
        user: {
            type: Object,
            default: null
        }
    },
    data() {
        return {
            userData: this.user ?? {
                name: '',
                email: '',
                password: ''
            }
        }
    }
}
</script>

<style scoped lang="scss">

</style>
