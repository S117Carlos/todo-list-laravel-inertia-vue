<template>
<div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
    <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
        <PaginationInfo :show="showPagination" :pagination="pagination" />
        <nav v-if="showPagination" class="relative z-0 inline-flex shadow-sm -space-x-px" aria-label="Pagination">
            <PreviousBtn :previousPage="previousPage"
                :show="pagesTotal > 0 && pagination.pageNumber > 1" />
            <div v-for="(page, index) in pagesNumber" :key="'page' + index" >
                <PaginationPageBtn
                    :currentPage="pagination.pageNumber"
                    :page="page"
                    :changePage="changePage" />
            </div>
            <!-- <MorePages /> -->
             <NextBtn :nextPage="nextPage"
                :show="pagination.pageNumber < pagesTotal && pagesTotal > pagesNumber[pagesNumber.length - 1]" />
        </nav>
    </div>
</div>
</template>

<script>
import PaginationInfo from './PaginationInfo';
import PreviousBtn from './PreviousBtn';
import NextBtn from './NextBtn';
import PaginationPageBtn from './PaginationPageBtn';
import MorePages from './PaginationPagesTooltip';

export default {
    components: {
        PaginationInfo,
        PaginationPageBtn,
        PreviousBtn,
        MorePages,
        NextBtn
    },
    props: {
        pagination: {
            type: Object,
            get: function() {
                return this.pagination;
            }
        },
        onChangePage: Function
    },
    data() {
        return {
            showPagination: false,
            pagesNumber: [],
            pagesTotal: 0,
            currentPage: 1,
            pagesLimit: 5
        };
    },
    methods: {
        changePage(page) {
            this.currentPage = page;
            this.onChangePage({
                ...this.pagination,
                currentPage: page
            });
        },
        previousPage() {
            let newPage = this.currentPage - 1;
            newPage = newPage <= 0 ? 1 : newPage;
            this.currentPage = newPage;
            let limitPerPage = this.pagesLimit;
            let previousPage = this.pagesNumber.filter(x => x === newPage);
            if (previousPage.length === 0) {
                // check how many pages are left to re - render 
                let limit = newPage;
                this.pagesNumber = [];
                for (let i = newPage - this.pagesLimit; i < limit; i++) {
                    this.pagesNumber.push(i + 1);
                }
            }
            this.onChangePage({
                ...this.pagination,
                currentPage: newPage
            });
        },
        nextPage() {
            let limitPerPage = this.pagesLimit;
            let newPage = this.currentPage + 1;
            this.currentPage = newPage >= this.pagesTotal ? this.pagesTotal : newPage; 
            let lastPage = this.pagesNumber[this.pagesNumber.length - 1];
            if (newPage > lastPage) {
                // check how many pages are left to re - render 
                let limit = lastPage + limitPerPage >= this.pagesTotal ? 
                this.pagesTotal - lastPage : limitPerPage;
                this.pagesNumber = [];
                for (let i = 0; i < limit; i++) {
                    this.pagesNumber.push(newPage + i);
                }

            }
            this.onChangePage({
                ...this.pagination,
                currentPage: newPage
            });
        }
    },
    mounted() {
        this.showPagination = this.pagination.recordsTotal > 0;
        let pages = this.pagination.pages;
        let pagesSHown = this.pagesLimit > pages ? pages : this.pagesLimit;
        this.pagesTotal = pages;
        for (let i = 0; i < pagesSHown; i++) {
            this.pagesNumber.push(i + 1);
        }
    }
}
</script>