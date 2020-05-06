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
        height: 3rem;
        width: 80%;
    }
</style>