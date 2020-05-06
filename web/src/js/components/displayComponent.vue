<template>
    <div class="display">
        <span>
            {{valueToDisplay}}
        </span>
    </div>
</template>

<script>
    export default {
        name: "displayComponent",
        props: {
            valueToDisplay: {
                required: true,
                type: String,
            }
        }
    }
</script>

<style lang="scss" scoped>
    .display {
        margin-bottom: 2rem;
        height: 5rem;
        width: 85%;
        margin-left: auto;
        margin-right: auto;
        border-radius: 0.5rem;
        background-color: #ababab;
        display: flex;
        justify-content: center;
        align-items: center;

        span {
            font-size: 2rem;
        }
    }
</style>