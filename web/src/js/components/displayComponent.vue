<template>
    <div class="display">
        <div class="memoryDisplay">
            <span>{{memorizedDisplay}}</span>
        </div>
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
            },
            memorizedDisplay: {
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
        flex-direction: column;

        .memoryDisplay {
            position: relative;
            width: 100%;
            height: 45%;

            > span {
                font-size: 1.3rem;
                color: #5a6268;
                position: absolute;
                right: 7%;
                top: 13%;
            }
        }

        > span {
            font-size: 2rem;
        }
    }
</style>