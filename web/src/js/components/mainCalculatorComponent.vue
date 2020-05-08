<template>
    <div class="calculator">
        <display-component :value-to-display="computedValueToDisplay"
                           :memorized-display="computedMemorizedDisplayValues"></display-component>
        <div class="buttons">
            <div class="d-flex justify-content-between mb-2 mt-2">
                <button-component @button-pressed="memoryOperationButtonPressedHandler" button-name="MC">MC
                </button-component>
                <button-component @button-pressed="memoryOperationButtonPressedHandler" button-name="MR">MR
                </button-component>
                <button-component @button-pressed="memoryOperationButtonPressedHandler" button-name="M+">M+
                </button-component>
                <button-component @button-pressed="memoryOperationButtonPressedHandler" button-name="M-">M-
                </button-component>
            </div>
            <div class="d-flex justify-content-between mb-2 mt-2">
                <button-component @button-pressed="unaryOperationButtonPressedHandler" button-name="sin">sin
                </button-component>
                <button-component @button-pressed="unaryOperationButtonPressedHandler" button-name="cos">cos
                </button-component>
                <button-component @button-pressed="unaryOperationButtonPressedHandler" button-name="tg">tg
                </button-component>
                <button-component @button-pressed="unaryOperationButtonPressedHandler" button-name="arctg">arctg
                </button-component>
            </div>
            <div class="d-flex justify-content-between mb-2 mt-2">
                <button-component @button-pressed="unaryOperationButtonPressedHandler" button-name="log">log
                </button-component>
                <button-component @button-pressed="unaryOperationButtonPressedHandler" button-name="ln">Ln
                </button-component>
                <button-component @button-pressed="unaryOperationButtonPressedHandler" button-name="fact">!
                </button-component>
                <button-component @button-pressed="unaryOperationButtonPressedHandler" button-name="1divx">1/x
                </button-component>

            </div>
            <div class="d-flex justify-content-between mb-2 mt-2">
                <button-component @button-pressed="unaryOperationButtonPressedHandler" button-name="exp">e^x
                </button-component>
                <button-component @button-pressed="binaryOperationButtonPressedHandler" button-name="pow">x^y
                </button-component>
                <button-component @button-pressed="binaryOperationButtonPressedHandler" button-name="mod">%
                </button-component>
                <button-component @button-pressed="binaryOperationButtonPressedHandler" button-name="divide">/
                </button-component>
            </div>
            <div class="d-flex justify-content-between mb-2 mt-2">
                <button-component @button-pressed="numericButtonPressed" button-name="7">7</button-component>
                <button-component @button-pressed="numericButtonPressed" button-name="8">8</button-component>
                <button-component @button-pressed="numericButtonPressed" button-name="9">9</button-component>
                <button-component @button-pressed="binaryOperationButtonPressedHandler" button-name="multiply">*
                </button-component>
            </div>
            <div class="d-flex justify-content-between mb-2 mt-2">
                <button-component @button-pressed="numericButtonPressed" button-name="4">4</button-component>
                <button-component @button-pressed="numericButtonPressed" button-name="5">5</button-component>
                <button-component @button-pressed="numericButtonPressed" button-name="6">6</button-component>
                <button-component @button-pressed="binaryOperationButtonPressedHandler" button-name="subtract">-
                </button-component>
            </div>
            <div class="d-flex justify-content-between mb-2 mt-2">
                <button-component @button-pressed="numericButtonPressed" button-name="1">1</button-component>
                <button-component @button-pressed="numericButtonPressed" button-name="2">2</button-component>
                <button-component @button-pressed="numericButtonPressed" button-name="3">3</button-component>
                <button-component @button-pressed="binaryOperationButtonPressedHandler" button-name="add">+
                </button-component>
            </div>
            <div class="d-flex justify-content-between mb-2 mt-2">
                <button-component @button-pressed="unaryOperationButtonPressedHandler" button-name="negate">+/-
                </button-component>
                <button-component @button-pressed="numericButtonPressed" button-name="0">0</button-component>
                <button-component @button-pressed="numericButtonPressed" button-name="dot">.</button-component>
                <button-component @button-pressed="numericButtonPressed" button-name="reduce"><=</button-component>
            </div>
            <div class="d-flex justify-content-between mb-2 mt-2">
                <button-component @button-pressed="binaryOperationButtonPressedHandler"
                                  button-width="14"
                                  button-name="evaluate">=
                </button-component>
                <button-component @button-pressed="clearMemory()" button-name="clearMem">CE
                </button-component>
            </div>
        </div>
    </div>
</template>

<script>
    import DisplayComponent from "@/js/components/displayComponent";
    import ButtonComponent from "@/js/components/buttonComponent";
    import {DataReceiver} from "@/js/DataReceiver";
    import {memoryOperationUrl, binaryOperationUrl, unaryOperationUrl, clearMemoryUrl} from "@/js/config";
    import {OperationTypes} from "@/js/OperationTypes";

    export default {
        name: "mainCalculatorComponent",
        data() {
            return {
                displayValue: '0',
                memorizedDisplayValues: '',
                dataProvider: new DataReceiver(),
                inputFromStart: false,
                previousInputWasANumber: false,
            }
        },
        computed: {
            /**
             * actually we dont lose any accuracy
             * but doesn't display that
             */
            computedValueToDisplay() {
                return `${this.displayValue.slice(0, 18)}`;
            },
            computedMemorizedDisplayValues() {
                let [leftValue, operation] = this.memorizedDisplayValues.split(' ')
                if (leftValue && operation) {
                    return `${leftValue} ${OperationTypes.hasOwnProperty(operation) ? OperationTypes[operation] : operation}`
                } else {
                    return ''
                }
            }
        },
        created() {
            this.clearMemory(true);
        },
        methods: {
            async unaryOperationButtonPressedHandler(data) {
                this.inputFromStart = true;
                let nestedData = {
                    operation: data,
                    rightValue: this.displayValue
                }
                this.displayValue = (await this.dataProvider.receiveResponseData(unaryOperationUrl, nestedData)).resultValue
            },
            async binaryOperationButtonPressedHandler(data) {

                this.inputFromStart = true;
                let nestedData = {
                    operation: data,
                }
                if (this.previousInputWasANumber) {
                    this.previousInputWasANumber = false;
                    nestedData.rightValue = this.displayValue
                }
                let tmp = (await this.dataProvider.receiveResponseData(binaryOperationUrl, nestedData)).resultValue
                if (data === 'evaluate') {
                    this.displayValue = tmp;
                    this.memorizedDisplayValues = '';
                    this.inputFromStart = true;
                    this.previousInputWasANumber = true
                } else {
                    this.memorizedDisplayValues = tmp;
                }
            },
            async memoryOperationButtonPressedHandler(data) {
                this.inputFromStart = true;
                let nestedData = {
                    operation: data,
                    rightValue: this.displayValue
                }
                this.displayValue = (await this.dataProvider.receiveResponseData(memoryOperationUrl, nestedData)).resultValue
            },
            async clearMemory(fullClean = false) {
                await this.dataProvider.receiveResponseData(`${clearMemoryUrl}${fullClean ? '?full=true' : ''}`)
                this.displayValue = '0'
                this.memorizedDisplayValues = ''
                this.inputFromStart = true;
                this.previousInputWasANumber = false
            },
            /**
             *  input via ajax is a pervert idea
             */
            numericButtonPressed(number) {
                this.previousInputWasANumber = true
                if (this.inputFromStart) {
                    this.displayValue = ''
                    this.inputFromStart = false
                }
                if (number === 'reduce') {
                    this.displayValue = this.displayValue.slice(0, -1)
                } else {
                    this.displayValue += number === 'dot' ? '.' : number
                }
            },
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