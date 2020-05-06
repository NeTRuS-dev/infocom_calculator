<template>
    <div :style="{width:buttonWidth+'rem',height:buttonHeight+'rem'}" @click="buttonPressed">
    <span>
        {{buttonName}}
    </span>
    </div>
</template>

<script>
    export default {
        name: "buttonComponent",
        props: {
            buttonName: {
                type: String,
                required: true,
            },
            buttonHeight: {
                type: Number,
                default: 4,
            },
            buttonWidth: {
                type: Number,
                default: 4,
            },
        },
        methods: {
            buttonPressed() {
                this.$emit('button-pressed', this.buttonName);
            }
        }
    }
</script>

<style lang="scss" scoped>
    div {
        display: flex;
        justify-content: center;
        align-items: center;

    }
</style>