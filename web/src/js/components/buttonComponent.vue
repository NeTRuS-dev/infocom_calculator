<template>
    <div @click="buttonPressed">
    <span>
        <slot></slot>
    </span>
    </div>
</template>

<script>
    export default {
        name: "buttonComponent",
        props: {
            buttonName: String
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
        height: 4rem;
        width: 4rem;
        display: flex;
        justify-content: center;
        align-items: center;

    }
</style>