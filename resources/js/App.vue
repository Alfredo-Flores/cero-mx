<template>
    <div v-if="$auth.ready()">
        <router-view/>
    </div>
    <div v-else>
        Site loading...
    </div>
</template>

<script>
    export default {
        name: "App.vue"
    }
</script>

<style scoped>

</style>
