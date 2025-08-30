<script setup>
</script>

<template>
    <div class="sidebar">
        <label>Мебель<input type="checkbox"></label>
        <label>Диван<input type="checkbox"></label>
        <label>Кровать<input type="checkbox"></label>
        <label>Комод<input type="checkbox"></label>
        <label>Шкаф<input type="checkbox"></label>
        <label>Стол<input type="checkbox"></label>
        <label>Кресло<input type="checkbox"></label>
        <label>Стул<input type="checkbox"></label>
    </div>
</template>

<style scoped>
    .sidebar label{
        gap: 0.5rem;
        display: flex;
    }
    .sidebar{
        display: flex;
        background-color: gray;
        border-radius: 1rem;
        padding: 1rem;
        width: 15%;
        font-size: 1.5rem;
        flex-direction: column;
    }
</style>
