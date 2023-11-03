<template>
    <el-row justify="center">
        <el-col :span="24">
            <el-button type="success" :icon="Plus" @click="create"></el-button>
        </el-col>
        <el-col :span="24">
            <List :items="users" :fields="{
                id:'Id',
                name:'Name',
            }" :with-buttons="true"
                  :edit-cb="edit"
                  :remove-cb="remove"
                  style="padding-top: 24px"/>
        </el-col>
    </el-row>
</template>
<script>
import List from '../../components/List.vue'
import {Plus} from '@element-plus/icons-vue';
import users from '../../api/user.js'

export default {
    name: "Users",
    components: {
        List,
    },
    data() {
        return {
            users: [],
            Plus
        }
    },
    methods: {
        edit(id) {
            this.$router.push({name: 'users', params: {id}})
        },
        remove(id) {
            users.remove(id).then(({errors}) => {
                if (errors) {
                    this.$message({type: 'error', message: errors});

                    return;
                }
                this.updateUsersList();
            })
        },
        updateUsersList() {
            users.getAll().then(({errors, data}) => {
                if (errors) {
                    this.$message({type: 'error', message: errors});

                    return;
                }
                this.users = data;
            })
        },
        create() {
            this.$router.push({name: 'users.create'});
        }
    },
    created() {
        this.updateUsersList();
    }
}
</script>

<style scoped lang="scss">

</style>
