<template>
    <div>
        <button v-if="page === currentPage" 
            @click="changePage(page)"
            class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-indigo-600 text-sm font-medium text-white hover:bg-indigo-50">
        {{page}}
        </button>
        <button v-else @click="changePage(page)"
            class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
        {{page}}
        </button>
    </div>
</template>

<script>
export default {
    name: "paginationPageBtn",
    props: {
        // pagesNumber: Array,
        page: Number,
        currentPage: Number,
        changePage: Function
    }
}
</script>