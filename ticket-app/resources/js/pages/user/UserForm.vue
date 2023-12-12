<template>
    <el-form v-loading="!isCreateForm && loading">
        <el-form-item label="Name">
            <el-input v-model="userData.name"></el-input>
        </el-form-item>
        <el-form-item label="Email">
            <el-input v-model="userData.email"></el-input>
        </el-form-item>
        <el-form-item label="Password">
            <el-input v-model="userData.password"></el-input>
        </el-form-item>
        <el-button @click="isCreateForm ? create():update()">{{ isCreateForm ? 'Create' : 'Update' }}</el-button>
    </el-form>
</template>
<script>
import users from '../../api/user.js'

export default {
    name: "UserForm",
    data() {
        return {
            userData: {
                name: '',
                email: '',
                password: ''
            },
            loading: false
        }
    },
    created() {
        if (!this.isCreateForm) {
            this.loading = true;
            users.get(this.$route.params.id).then(({errors, data: {name, email}}) => {
                if (errors) {
                    this.$message({type: 'error', message: errors});

                    return;
                }

                this.userData.name = name;
                this.userData.email = email;
            }).finally(() => {
                this.loading = false;
            });
        }
    },
    computed: {
        isCreateForm() {
            return this.$route.name === 'users.create';
        }
    },
    methods: {
        create() {
            users.create(this.userData).then(({errors}) => {
                if (errors) {
                    this.$message({type: 'error', message: errors});

                    return;
                }
                this.$message({type: 'success', message: 'User created.'});
                this.$router.push({name: 'users'});
            });
        },
        update() {
            users.update(this.$route.params.id, {
                name: this.userData.name,
                email: this.userData.email
            }).then(({errors}) => {
                if (errors) {
                    this.$message({type: 'error', message: errors});

                    return;
                }
                this.$message({type: 'success', message: 'User updated.'});
                this.$router.push({name: 'users'});
            });
        }
    }
}
</script>

<style scoped lang="scss">

</style>
