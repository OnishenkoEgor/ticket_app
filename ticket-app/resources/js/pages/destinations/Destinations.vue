<template>
    <el-row v-if="$route.name === 'destinations'" justify="center">
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

import List from "../../components/List.vue";

export default {
    name: "Destinations",
    components: {List},

}
</script>

<style scoped lang="scss">

</style>
