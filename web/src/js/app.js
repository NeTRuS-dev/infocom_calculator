import '@/scss/styles.scss';
import Vue from 'vue';
import BaseCalculatorComponent from "@/js/components/baseCalculatorComponent";

new Vue({
    template: `
        <base-calculator-component>
        </base-calculator-component>`,
    components: {BaseCalculatorComponent},
}).$mount('#app_entry');