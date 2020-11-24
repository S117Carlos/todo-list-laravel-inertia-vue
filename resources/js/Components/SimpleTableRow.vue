<template>
    <tr>
        <RowItem v-for="(key, index) in Object.keys(row)" 
            :key="'row' + index"
            :data="row[key]"
        />
    </tr> 
</template>
<script>
    import RowItem from 'Components/SimpleTableRowItem';

export default {
    name: 'SimpleTableRow',
    components: {
        RowItem
    },
    props: {
        row: Object
    }
}
</script>