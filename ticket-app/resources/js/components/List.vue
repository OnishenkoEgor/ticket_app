<template>
    <el-table :data="items">
        <el-table-column v-for="(field,key) in fields" :prop="key" :label="field"></el-table-column>
        <el-table-column v-if="withButtons" label="Actions" align="right">
            <template #default="scope">
                <el-button @click="()=>showCb(scope.row.id)" type="info" :icon="view" circle/>
                <el-button @click="()=>editCb(scope.row.id)" type="primary" :icon="edit" circle/>
                <el-button @click="()=>removeCb(scope.row.id)" type="danger" :icon="remove" circle/>
            </template>
        </el-table-column>
    </el-table>
</template>
<script>
import {Delete, Edit, View} from '@element-plus/icons-vue'
import {shallowRef} from "vue";

export default {
    name: "List",
    props: {
        items: {
            required: true,
            type: Array
        },
        fields: {
            required: true,
            type: Object
        },
        withButtons: {
            required: false,
            type: Boolean,
            default: false
        },
        showCb: {
            required: false,
            type: Function,
            default: () => {

            }
        },
        editCb: {
            required: false,
            type: Function,
            default: () => {

            }
        },
        removeCb: {
            required: false,
            type: Function,
            default: () => {

            }
        }
    },
    data() {
        let remove = shallowRef(Delete);
        let edit = shallowRef(Edit);
        let view = shallowRef(View);

        return {
            remove,
            edit,
            view
        }
    }
}
</script>
<style scoped lang="scss">

</style>
