<template>
    <div class="p-4">
        <div class="bg-white flex items-center rounded-full shadow-xl">
            <input
                v-model="query" 
                class="rounded-l-full w-full py-4 px-6 text-gray-700 leading-tight focus:outline-none" id="search" type="text" placeholder="Search">
            <div class="p-4">
                <button @click="onSearch"
                class="bg-blue-500 text-white rounded-full p-2 hover:bg-blue-400 focus:outline-none w-12 h-12 flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'search-button',
    props: {
        queryString: String
    },
    data() {
        return {
            query: this.queryString
        }
    },
    methods: {
        onSearch() {
            this.$emit('searchQueryString', this.query);
        }
    }
}
</script>