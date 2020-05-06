<template>
    <div class="calculator">
        <display-component :value-to-display.camel="displayValue"></display-component>
        <div class="buttons">
            <div class="d-flex justify-content-between">
                <button-component button-name.camel="MC"></button-component>
                <button-component button-name.camel="MS"></button-component>
                <button-component button-name.camel="MR"></button-component>
                <button-component button-name.camel="M+"></button-component>
                <button-component button-name.camel="M-"></button-component>
            </div>
        </div>
    </div>
</template>

<script>
    import DisplayComponent from "@/js/components/displayComponent";
    import ButtonComponent from "@/js/components/buttonComponent";

    export default {
        name: "mainCalculatorComponent",
        data() {
            return {
                displayValue: '',
            }
        },
        created() {
            //TODO fetch memorized
            //displayValue
        },
        components: {ButtonComponent, DisplayComponent},
    }
</script>

<style lang="scss" scoped>
    .calculator {
        width: 30rem;
        height: 35rem;

        .buttons {
            width: 100%;
        }
    }
</style>