<template>
    <el-breadcrumb :separator-icon="ArrowRight" style="padding-bottom: 24px">
        <el-breadcrumb-item :to="{ path: '/' }">Home</el-breadcrumb-item>
        <el-breadcrumb-item>Users</el-breadcrumb-item>
    </el-breadcrumb>
</template>
<script>
import {ArrowRight} from '@element-plus/icons-vue'

export default {
    name: "Breadcrumbs",
    data() {
        return {
            ArrowRight,
        }
    }
}
</script>

<style scoped lang="scss">

</style>
