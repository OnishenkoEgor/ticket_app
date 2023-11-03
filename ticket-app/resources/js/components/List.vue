<template>
    <el-table :data="items">
        <el-table-column v-for="(field,key) in fields" :prop="key" :label="field"></el-table-column>
        <el-table-column v-if="withButtons" label="Actions" align="right">
            <template #default="scope">
                <el-button @click="()=>editCb(scope.row.id)" type="primary" :icon="Edit" circle/>
                <el-button @click="()=>removeCb(scope.row.id)" type="danger" :icon="Delete" circle></el-button>
            </template>
        </el-table-column>
    </el-table>
</template>
<script>
import {Delete, Edit} from '@element-plus/icons-vue'

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
        return {
            Delete,
            Edit
        }
    }
}
</script>
<style scoped lang="scss">

</style>
