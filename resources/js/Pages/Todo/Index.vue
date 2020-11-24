<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Todo List
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <search-button @searchQueryString="search"/>
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <SimpleTable :headers="headers" :rowsData="rowsData" />
                </div>
                <Pagination v-bind:pagination="pagination" :onChangePage="onChangePage" />
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import Welcome from '@/Jetstream/Welcome'
    import SimpleTable from 'Components/SimpleTable';
    import Pagination from 'Components/Pagination/Pagination';
    import SearchButton from 'Components/SearchButton';


    export default {
        components: {
            AppLayout,
            Welcome,
            SimpleTable,
            Pagination,
            'search-button': SearchButton
        },
        props: {
            rowsData: Array,
            headers: Array,
            pagination: Object
        },
        methods: {
            onChangePage(data) {
                this.$inertia.post(route('itemNextPage'), {
                    pageNumber: data.currentPage,
                    pageSize: data.pageSize
                });
            },
            search(query) {
                this.$inertia.post(route('itemSearch'), {query});
            }
        }
    }
</script>
