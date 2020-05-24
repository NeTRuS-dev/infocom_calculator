<template>
    <div @select.prevent @mousedown.prevent :style="{width:buttonWidth+'rem',height:buttonHeight+'rem'}"
         @click="buttonPressed" class="btn" :class="{disabled:isWaitingForResponse}">
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
            isWaitingForResponse: {
                type: Boolean,
                required: true,
            },
            buttonHeight: {
                type: String,
                default: '3',
            },
            buttonWidth: {
                type: String,
                default: '3',
            },
        },
        methods: {
            buttonPressed() {
                if (!this.isWaitingForResponse) {
                    this.$emit('button-pressed', this.buttonName);
                }
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

        .disabled {
            pointer-events: none !important;
        }
    }
</style>