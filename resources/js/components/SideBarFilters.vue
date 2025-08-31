<script setup>
import { ref } from "vue";

// Состояние фильтров
const filters = ref({
    // Мебель
    furniture: false,
    sofa: false,
    bed: false,
    dresser: false,
    wardrobe: false,
    table: false,
    armchair: false,
    chair: false,

    // Техника
    appliances: false,
    fridge: false,
    tv: false,
    washer: false,
    microwave: false,

    // Инструменты
    tools: false,
    hammer: false,
    screwdriver: false,
    saw: false,
    chisel: false,
    axe: false,
    spanner: false,
    pliers: false,
});

// Состояние раскрытия категорий
const expanded = ref({
    furniture: false,
    appliances: false,
    tools: false,
});

// Подкатегории каждой группы
const subcategories = {
    furniture: ["sofa", "bed", "dresser", "wardrobe", "table", "armchair", "chair"],
    appliances: ["fridge", "tv", "washer", "microwave"],
    tools: ["hammer", "screwdriver", "saw", "chisel", "axe", "spanner", "pliers"],
};

// Функция для клика по категории
function toggleGroup(name) {
    // меняем чекбокс главной категории
    filters.value[name] = !filters.value[name];

    // открываем/закрываем подсписок
    expanded.value[name] = !expanded.value[name];

    // если закрываем категорию, сбрасываем подкатегории
    if (!expanded.value[name]) {
        subcategories[name].forEach(sub => {
            filters.value[sub] = false;
        });
    }
}
</script>

<template>
    <div class="sidebar">
        <h3>Фильтры</h3>

        <!-- Мебель -->
        <div class="group" @click="toggleGroup('furniture')">
            <span class="arrow">{{ expanded.furniture ? "▲" : "▼" }}</span>
            <span class="group-text">Мебель</span>
            <input type="checkbox" :checked="filters.furniture" />
        </div>
        <div v-if="expanded.furniture" class="sub-list">
            <label><span>Диван</span><input type="checkbox" v-model="filters.sofa" /></label>
            <label><span>Кровать</span><input type="checkbox" v-model="filters.bed" /></label>
            <label><span>Комод</span><input type="checkbox" v-model="filters.dresser" /></label>
            <label><span>Шкаф</span><input type="checkbox" v-model="filters.wardrobe" /></label>
            <label><span>Стол</span><input type="checkbox" v-model="filters.table" /></label>
            <label><span>Кресло</span><input type="checkbox" v-model="filters.armchair" /></label>
            <label><span>Стул</span><input type="checkbox" v-model="filters.chair" /></label>
        </div>

        <!-- Техника -->
        <div class="group" @click="toggleGroup('appliances')">
            <span class="arrow">{{ expanded.appliances ? "▲" : "▼" }}</span>
            <span class="group-text">Техника</span>
            <input type="checkbox" :checked="filters.appliances" />
        </div>
        <div v-if="expanded.appliances" class="sub-list">
            <label><span>Холодильник</span><input type="checkbox" v-model="filters.fridge" /></label>
            <label><span>Телевизор</span><input type="checkbox" v-model="filters.tv" /></label>
            <label><span>Стиральная машина</span><input type="checkbox" v-model="filters.washer" /></label>
            <label><span>Микроволновка</span><input type="checkbox" v-model="filters.microwave" /></label>
        </div>

        <!-- Инструменты -->
        <div class="group" @click="toggleGroup('tools')">
            <span class="arrow">{{ expanded.tools ? "▲" : "▼" }}</span>
            <span class="group-text">Инструменты</span>
            <input type="checkbox" :checked="filters.tools" />
        </div>
        <div v-if="expanded.tools" class="sub-list">
            <label><span>Молоток</span><input type="checkbox" v-model="filters.hammer" /></label>
            <label><span>Отвёртка</span><input type="checkbox" v-model="filters.screwdriver" /></label>
            <label><span>Пила</span><input type="checkbox" v-model="filters.saw" /></label>
            <label><span>Стамеска</span><input type="checkbox" v-model="filters.chisel" /></label>
            <label><span>Топор</span><input type="checkbox" v-model="filters.axe" /></label>
            <label><span>Гаечный ключ</span><input type="checkbox" v-model="filters.spanner" /></label>
            <label><span>Плоскогубцы</span><input type="checkbox" v-model="filters.pliers" /></label>
        </div>
    </div>
</template>

<style scoped>
.sidebar {
    display: flex;
    flex-direction: column;
    border-radius: 10px;
    padding: 1.5rem;
    width: 270px;
    font-family: 'Inter', sans-serif;
    background-color: #ffffff;
}

.sidebar h3 {
    margin: 0 0 1rem;
    color: #333;
    font-size: 1.5rem;
    font-weight: 600;
    text-align: left;
    border-bottom: 2px solid #232323;
    padding-bottom: 0.5rem;
}

.group {
    display: flex;
    align-items: center;
    justify-content: space-between;
    font-size: 1.2rem;
    color: #444;
    cursor: pointer;
    padding: 0.5rem 0;
}
.group:hover {
    color: #4a90e2;
}
.group-text {
    flex-grow: 1;
    margin: 0 0.5rem;
    text-align: left;
}
.arrow {
    font-size: 0.9rem;
    color: #666;
    width: 20px;
}
.group input[type="checkbox"],
.sidebar input[type="checkbox"] {
    accent-color: #4a90e2;
    width: 1.2rem;
    height: 1.2rem;
    border-radius: 4px;
}
.sub-list {
    margin-left: 1.5rem;
    margin-top: 0.5rem;
    border-left: 2px solid #eee;
    padding-left: 0.8rem;
}
.sub-list label {
    padding-bottom: 0.6rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
    color: #444;
    font-size: 1.1rem;
    cursor: pointer;
}
.sub-list label:hover {
    color: #4a90e2;
}
</style>
