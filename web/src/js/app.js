import '@/scss/styles.scss';
import Vue from 'vue';
import BaseCalculatorComponent from "@/js/components/baseCalculatorComponent";

new Vue({
    el: '#app_entry',
    template: `
        <base-calculator-component>
        </base-calculator-component>`,
    components: {BaseCalculatorComponent},
});