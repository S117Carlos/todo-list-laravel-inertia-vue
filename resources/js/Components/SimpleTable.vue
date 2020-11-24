<template>
        <!-- This example requires Tailwind CSS v2.0+ -->
<div class="flex flex-col">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
          <tbody class="bg-white divide-y divide-gray-200">
             <Row v-for="(row, index) in rowsData" 
                  :key="index" 
                  :row="row"
              />
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</template>

<script>
    import Row from 'Components/SimpleTableRow';
    export default {
        name: 'SimpleTable',
        mounted() {
          console.log(this.$store, 'STORE')
        },
        components:{
            Row
        },
        props: {
            headers: Array,
            rowsData: {
              type: Array
            }
        }
    }
</script>