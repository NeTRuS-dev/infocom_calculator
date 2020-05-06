<template>
    <div class="display">{{valueToDisplay}}</div>
</template>

<script>
    export default {
        name: "displayComponent",
        props: {
            valueToDisplay: String
        }
    }
</script>

<style lang="scss" scoped>
    .display {
        height: 6rem;
        width: 80%;
        margin-left: auto;
        margin-right: auto;
    }
</style>