<template>
    <div class="calculator-wrapper">
        <main-calculator-component></main-calculator-component>
    </div>
</template>

<script>
    import MainCalculatorComponent from "@/js/components/mainCalculatorComponent";

    export default {
        name: "baseCalculatorComponent",
        components: { MainCalculatorComponent },

    }
</script>

<style lang="scss" scoped>
    .calculator-wrapper{
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>