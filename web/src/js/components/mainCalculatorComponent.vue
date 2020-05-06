<template>
    <div class="calculator">
        <display-component :value-to-display="computedValueToDisplay"></display-component>
        <div class="buttons">
            <div class="d-flex justify-content-between mb-2 mt-2">
                <button-component @button-pressed="buttonPressedHandler" button-name="MC">MC</button-component>
                <button-component @button-pressed="buttonPressedHandler" button-name="MR">MR</button-component>
                <button-component @button-pressed="buttonPressedHandler" button-name="M+">M+</button-component>
                <button-component @button-pressed="buttonPressedHandler" button-name="M-">M-</button-component>
            </div>
            <div class="d-flex justify-content-between mb-2 mt-2">
                <button-component @button-pressed="buttonPressedHandler" button-name="sin">sin</button-component>
                <button-component @button-pressed="buttonPressedHandler" button-name="cos">cos</button-component>
                <button-component @button-pressed="buttonPressedHandler" button-name="tg">tg</button-component>
                <button-component @button-pressed="buttonPressedHandler" button-name="arctg">arctg</button-component>
            </div>
            <div class="d-flex justify-content-between mb-2 mt-2">
                <button-component @button-pressed="buttonPressedHandler" button-name="log">log</button-component>
                <button-component @button-pressed="buttonPressedHandler" button-name="ln">Ln</button-component>
                <button-component @button-pressed="buttonPressedHandler" button-name="fact">!</button-component>
                <button-component @button-pressed="buttonPressedHandler" button-name="1divx">1/x</button-component>

            </div>
            <div class="d-flex justify-content-between mb-2 mt-2">
                <button-component @button-pressed="buttonPressedHandler" button-name="exp">e^x</button-component>
                <button-component @button-pressed="buttonPressedHandler" button-name="pow">x^y</button-component>
                <button-component @button-pressed="buttonPressedHandler" button-name="mod">%</button-component>
                <button-component @button-pressed="buttonPressedHandler" button-name="divide">/</button-component>
            </div>
            <div class="d-flex justify-content-between mb-2 mt-2">
                <button-component @button-pressed="numericButtonPressed" button-name="7">7</button-component>
                <button-component @button-pressed="numericButtonPressed" button-name="8">8</button-component>
                <button-component @button-pressed="numericButtonPressed" button-name="9">9</button-component>
                <button-component @button-pressed="buttonPressedHandler" button-name="multiply">*</button-component>
            </div>
            <div class="d-flex justify-content-between mb-2 mt-2">
                <button-component @button-pressed="numericButtonPressed" button-name="4">4</button-component>
                <button-component @button-pressed="numericButtonPressed" button-name="5">5</button-component>
                <button-component @button-pressed="numericButtonPressed" button-name="6">6</button-component>
                <button-component @button-pressed="buttonPressedHandler" button-name="subtract">-</button-component>
            </div>
            <div class="d-flex justify-content-between mb-2 mt-2">
                <button-component @button-pressed="numericButtonPressed" button-name="1">1</button-component>
                <button-component @button-pressed="numericButtonPressed" button-name="2">2</button-component>
                <button-component @button-pressed="numericButtonPressed" button-name="3">3</button-component>
                <button-component @button-pressed="buttonPressedHandler" button-name="add">+</button-component>
            </div>
            <div class="d-flex justify-content-between mb-2 mt-2">
                <button-component @button-pressed="buttonPressedHandler" button-name="negate">+/-</button-component>
                <button-component @button-pressed="numericButtonPressed" button-name="0">0</button-component>
                <button-component @button-pressed="numericButtonPressed" button-name="dot">.</button-component>
                <button-component @button-pressed="numericButtonPressed" button-name="reduce"><=</button-component>
            </div>
            <div class="d-flex justify-content-center mb-2 mt-2">
                <button-component @button-pressed="buttonPressedHandler"
                                  button-width="14"
                                  button-name="evaluate">=
                </button-component>
            </div>
        </div>
    </div>
</template>

<script>
    import DisplayComponent from "@/js/components/displayComponent";
    import ButtonComponent from "@/js/components/buttonComponent";
    import {extendedFetch} from "@/js/extended_fetch";

    export default {
        name: "mainCalculatorComponent",
        data() {
            return {
                displayValue: '',
            }
        },
        computed: {
            computedValueToDisplay() {
                return this.displayValue.slice(0, 18);
            }
        },
        created() {
            //TODO fetch memorized
            //displayValue
        },
        methods: {
            buttonPressedHandler(data) {
                //TODO send data update

            },
            /**
             *  input via ajax is a pervert idea
             */
            numericButtonPressed(number) {
                if (number === 'reduce') {
                    this.displayValue = this.displayValue.slice(0, -1)
                } else {
                    this.displayValue += number === 'dot' ? '.' : number;
                }
            }
        },
        components: {ButtonComponent, DisplayComponent},
    }
</script>

<style lang="scss" scoped>
    .calculator {
        padding: 1rem;
        width: 25rem;
        height: auto;
        background-color: #e5e5e5;
        border-radius: 1%;

        .buttons {
            width: 100%;
            padding-left: 1rem;
            padding-right: 1rem;
        }
    }
</style>