<template>
    <input type="text" />
</template>

<script>
    export default {
        name: 'v-datepicker',
        mounted(){
            $(this.$el).datepicker({
                format: "dd/mm/yyyy",
                todayBtn: "linked",
                clearBtn: true,
                language: "vi",
                autoclose: true,
                todayHighlight: true
            })
        }
    }
</script>
