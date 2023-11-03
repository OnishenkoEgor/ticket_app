<template>
    <el-card class="box-card">
        <template #header>
            {{ userName }}
        </template>
        <div v-for="(param,label) in userParams" class="text item">
            {{ label }}:{{ param }}
        </div>
    </el-card>
</template>
<script>
import user from '../../api/user.js';

export default {
    name: "UserCard",
    data() {
        return {
            userParams: {},
            userName: ''
        }
    },
    created() {
        user.get(this.$route.params.id).then(({errors, data}) => {
            if (errors) {
                this.$message({type: 'error', message: errors});

                return;
            }
            this.userName = data.name
            delete data.name;
            this.userParams = data;
        });
    },
}
</script>
<style scoped lang="scss">

</style>
