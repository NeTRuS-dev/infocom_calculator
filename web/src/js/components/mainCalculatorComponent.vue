<template>
    <div class="calculator">
            <display-component :value-to-display.camel="displayValue"></display-component>
    </div>
</template>

<script>
    import DisplayComponent from "@/js/components/displayComponent";
    export default {
        name: "mainCalculatorComponent",
        data(){
            return{
                displayValue:'',
            }
        },
        created() {
            //TODO fetch memorized
            //displayValue
        },
        components: {DisplayComponent},
    }
</script>

<style lang="scss" scoped>
    .calculator {
        width: 20rem;
        height: 25rem;
    }
</style>