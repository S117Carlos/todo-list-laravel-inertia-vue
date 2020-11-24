<template>
    <td v-if="data.isAvatar" 
        v-bind:class="`${baseTdClass} ${data.additionalStyleClasses || ''}`" >
        <div class="flex items-center">
            <div class="flex-shrink-0 h-10 w-10">
                <img class="h-10 w-10 rounded-full" v-bind:src="data.value" alt="">
            </div>
            <div class="ml-4">
                <div class="text-sm font-medium text-gray-900">
                    {{data.captionValue}}
                </div>
            </div>
        </div>
    </td>
    <td v-else-if="data.isText" 
        v-bind:class="`${baseTdClass} ${data.additionalStyleClasses || ''}`" >
        {{data.value}}
    </td>
    <td v-else-if="data.isButton" 
        v-bind:class="`${baseTdClass} ${data.additionalStyleClasses || ''}`" >
        <button v-bind:disabled="data.checked" 
            type="button" 
            class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm"
        >
        {{data.value}}
        </button>
    </td>
    <td v-else-if="data.isCheckbox" 
        v-bind:class="`${baseTdClass} ${data.additionalStyleClasses || ''}`" >
        <div class="px-4 py-5 bg-white space-y-6 sm:p-2">
            <div class="mt-4 space-y-4">
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                    <input id="comments" type="checkbox" 
                        disabled
                        class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded"
                        :checked="data.value">
                    </div>
                    <div class="ml-3 text-sm">
                    <label  v-if="data.label" 
                            for="comments" 
                            class="font-medium text-gray-700">
                        {{data.label}}
                    </label>
                    <p v-if="data.description" class="text-gray-500">
                        {{data.description}}
                    </p>
                    </div>
                </div>
            </div>
        </div>
    </td>

</template>
<script>
export default {
    name: 'RowItem',
    props: {
        data: Object
    },
    data() {
        return {
            baseTdClass: 'px-6 py-4 whitespace-nowrap'
        }
    }
}
</script>