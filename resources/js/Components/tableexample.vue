<template>
        <!-- This example requires Tailwind CSS v2.0+ -->
<div class="flex flex-col">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
          <tbody class="bg-white divide-y divide-gray-200">
             <tr v-for="(row, index) in rowsData" :key="index">
                <td v-bind:class="`px-6 py-4 whitespace-nowrap ${row[header].additionalStyleClasses || ''}`"
                  v-for="(header, headerIndex) in headers" 
                  :key="'header' + headerIndex">
                  <div v-if="row[header].isAvatar" class="flex items-center">
                    <div class="flex-shrink-0 h-10 w-10">
                      <img class="h-10 w-10 rounded-full" v-bind:src="row[header].value" alt="">
                    </div>
                    <div class="ml-4">
                      <div class="text-sm font-medium text-gray-900">
                        {{row[header].captionValue}}
                      </div>
                    </div>
                  </div>
                  <div v-if="row[header].isText" class="text-sm text-gray-900">
                      {{row[header].value}}
                  </div>
                  <div v-if="row[header].isButton" class="text-sm text-gray-900">
                      <button v-bind:disabled="row[header].checked" 
                      type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm"
                      >Edit</button>
                  </div>
              </td> 
             </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</template>

<script>
    export default {
        name: 'tableexample',
        props: {
            headers: Array,
            rowsData: {
              type: Array
            }
        }
    }
</script>