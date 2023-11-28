<template>
    <el-row v-if="$route.name === 'users'" justify="center">
        <el-col :span="24">
            <el-button type="success" :icon="plus" @click="create"></el-button>
        </el-col>
        <el-col :span="24">
            <List :items="users" :fields="{
                id:'Id',
                name:'Name',
            }" :with-buttons="true"
                  :show-cb="show"
                  :edit-cb="edit"
                  :remove-cb="remove"
                  style="padding-top: 24px"/>
        </el-col>
    </el-row>
    <router-view v-else></router-view>
</template>
<script>
import List from '../../components/List.vue'
import {Plus} from '@element-plus/icons-vue';
import users from '../../api/user.js'
import {shallowRef} from "vue";

export default {
    name: "UsersList",
    components: {
        List,
    },
    data() {
        let plus = shallowRef(Plus);

        return {
            users: [],
            plus
        }
    },
    methods: {
        show(id) {
            this.$router.push({name: 'users.get', params: {id}});
        },
        edit(id) {
            this.$router.push({name: 'users.update', params: {id}});
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
            this.$router.push({name: 'usersCreate'});
        }
    },
    created() {
        this.updateUsersList();
    }
}
</script>

<style scoped lang="scss">

</style>
