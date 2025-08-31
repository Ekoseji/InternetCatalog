<script setup>
import { Link } from "@inertiajs/vue3";
</script>

<template>
    <nav class="navbar">
        <div class="nav-links">
            <Link href="">Главная</Link>
            <Link href="">Каталог</Link>
            <Link href="">Контакты</Link>
        </div>
        <input class="search" placeholder="Поиск">
        <div class="nav-links">
            <Link href="">Профиль</Link>
            <Link href="">Корзина</Link>
        </div>
    </nav>
</template>

<style scoped>
.navbar {
    justify-content: space-between;
    display: flex;
    align-items: center;
    gap: 2rem;
    padding: 1rem 2rem;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    font-family: 'Inter', sans-serif;
}

.nav-links {
    display: flex;
    gap: 1.5rem;
    font-size: 1.2rem;
    font-weight: 500;
}

.nav-links a {
    text-decoration: none;
    color: #333;
    transition: color 0.3s;
}

.nav-links a:hover {
    color: #4a90e2;
}

.search {
    padding: 0.75rem 1rem;
    font-size: 1rem;
    border-radius: 0.75rem;
    border: 2px solid #232323;
    outline: none;
    background-color: #ffffff; /* оставляем белым */
    transition: 0.3s;
    width: 600px;
}

.search:focus {
    border-color: #232323;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.55);
}
</style>
