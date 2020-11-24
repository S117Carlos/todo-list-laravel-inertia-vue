<template>
    <div>
        <p v-if="show" class="text-sm text-gray-700 select-text">
            Showing
            <span class="font-medium">1</span>
            to
            <span class="font-medium">
                {{`${pagination.recordsTotal > pagination.pageSize ? 
                    pagination.pageSize : pagination.recordsTotal}`}}
            </span>
            of
            <span class="font-medium">{{pagination.recordsTotal}}</span>
            results
        </p>
        <p v-else class="text-sm text-gray-700">
            No records found
        </p>
    </div>
</template>

<script>
export default {
    name: 'paginationInfo',
    props:{
        show: Boolean,
        pagination: Object
    }
}
</script>