<template>
    <div :style="{width:buttonWidth+'rem',height:buttonHeight+'rem'}" @click="buttonPressed">
    <span>
       <slot></slot>
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
                default: 3,
            },
            buttonWidth: {
                type: Number,
                default: 3,
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
        background-color: #6d6d6d;
        border-radius: 0.5rem;

        &:hover {
            cursor: pointer;
            background-color: #898888;

        }
    }
</style>