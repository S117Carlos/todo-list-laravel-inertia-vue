<template>
    <div class='tooltip relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700'>
        ...
        <div class="tooltip-text border border-gray-300 bg-white px-5 py-5">
            <div class="flex justify-between py-5">
                <button> P </button>
                <button> N </button>
            </div>
            <div class="sm:flex-1 flex-wrap sm:flex sm:items-stretch sm:justify-stretch"> 
                <button v-for="(item, index) in [1,2, 3, 4, 5]" :key="index"
                class="relative inline-flex m-0.5 px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50"
                >
                {{item}}
                </button>

            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'MorePages',
    props: {
        currentPage: Number,
        pages: Array
    },
    data() {
        return {
            pagesInTooltip: []
        }
    },
    methods: {
        showPrevious() {
        },
        showNext() {

        }
    },
    mounted() {
        
    }

}
</script>

<style scoped>
.tooltip {
    position: relative;
}
.tooltip-text {
    visibility: hidden;
    width: 230px;
    z-index: 100;
    position: absolute;
    bottom: 100%;
    left: -50%;
    margin-left: -115px; /* Use half of the width (120/2 = 60), to center the tooltip */
}
.tooltip:hover .tooltip-text {
    visibility: visible;
}
</style>