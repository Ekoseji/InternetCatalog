<script setup>

import {Link} from "@inertiajs/vue3";
</script>

<template>
    <nav class="navbar">
        <Link href="">Главная</Link>
        <input class="search" placeholder="Поиск">
    </nav>
</template>

<style scoped>
    .navbar{
        margin-bottom: 2rem;
        font-size: 2rem;
        background: #EDC5AB;
        padding: 0.75rem;
        gap: 1rem;
        display: flex;
    }
    .search {
        padding: 0.75rem 1rem;
        font-size: 1rem;
        border-radius: 0.75rem;
        border: 2px solid #d2a679;
        outline: none;
        background-color: #fff8f0;
        transition: 0.3s;
        margin: auto;
        width: 500px;
    }

    .search:focus {
        border-color: #b97a56;
        box-shadow: 0 0 10px rgba(185, 122, 86, 0.5);

    }
</style>
