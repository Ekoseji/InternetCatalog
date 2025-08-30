<script setup>

import NavBar from "@/components/NavBar.vue";
</script>

<template>
    <div>
        <NavBar/>
        <main>
            <slot />
        </main>
    </div>
</template>

<style scoped>

</style>
