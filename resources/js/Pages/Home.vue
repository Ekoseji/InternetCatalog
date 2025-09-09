<script setup>
import {ref, watch, onMounted} from 'vue'
import {usePage, WhenVisible} from '@inertiajs/vue3'
import {Inertia} from '@inertiajs/inertia'

import Main from "@/Layouts/Main.vue"
import ProductCard from "@/components/ProductCard.vue"
import SideBarFilters from "@/components/SideBarFilters.vue"

defineOptions({
    layout: Main
})

const page = usePage()

// локальный список продуктов
const products = ref([...page.props.products])

// сортировка
const currentSort = ref('default')
const currentOrder = ref('asc')

const setSort = (field) => {
    currentSort.value = field
    Inertia.visit(window.location.pathname, {
        method: 'get',
        data: { sort: currentSort.value, order: currentOrder.value },
        replace: true,
        preserveState: true,
        preserveScroll: true,
    })
}

const toggleOrder = () => {
    currentOrder.value = currentOrder.value === 'asc' ? 'desc' : 'asc'
    Inertia.visit(window.location.pathname, {
        method: 'get',
        data: { sort: currentSort.value, order: currentOrder.value },
        replace: true,
        preserveState: true,
        preserveScroll: true,
    })
}

// следим за обновлением props.products и добавляем новые
watch(
    () => page.props.products,
    (newProducts) => {
        if (page.props.productsPagination.current_page > 1) {
            products.value = [...products.value, ...newProducts]
        } else {
            products.value = [...newProducts]
        }
    }
)

// вычисляем конец списка
const isEnd = ref(false)
watch(
    () => page.props.productsPagination,
    (pagination) => {
        isEnd.value = pagination?.current_page >= pagination?.last_page
    },
    {immediate: true}
)

// при монтировании проверяем query параметр page
onMounted(() => {
    const urlParams = new URLSearchParams(window.location.search)
    if (urlParams.get('page')) {
        // сбрасываем страницу на первую
        Inertia.visit(window.location.pathname, {preserveState: false})
    }
})
</script>

<template>
    <img src="../../../public/1.png" alt="" class="ad"/>
    <div class="page">
        <SideBarFilters/>
        <div class="content">
            <!-- Панель сортировки -->
            <div class="sorting">
                <span class="sort-label">Сортировать по:</span>

                <button
                    class="sort-btn"
                    :class="{ active: currentSort === 'default' }"
                    @click="setSort('default')"
                >Умолчанию</button>

                <button
                    class="sort-btn"
                    :class="{ active: currentSort === 'rating' }"
                    @click="setSort('rating')"
                >Рейтингу</button>

                <button
                    class="sort-btn"
                    :class="{ active: currentSort === 'price' }"
                    @click="setSort('price')"
                >Цене</button>

                <button
                    class="sort-btn"
                    :class="{ active: currentSort === 'reviews' }"
                    @click="setSort('reviews')"
                >Отзывам</button>

                <button class="sort-btn order-toggle" @click="toggleOrder">
                    {{ currentOrder === 'asc' ? '▲ Возрастанию' : '▼ Убыванию' }}
                </button>
            </div>

            <!-- Каталог -->
            <div class="catalog">
                <ProductCard
                    v-for="product in products"
                    :key="product.id"
                    :product="product"
                    class="card"
                />

                <!-- Infinite Scroll -->
                <WhenVisible
                    :always="!isEnd"
                    :params="{
                        data: { page: page.props.productsPagination.current_page + 1 },
                        only: ['products', 'productsPagination'],
                        preserveState: true
                    }"
                >
                    <div
                        v-if="isEnd"
                        class="text-center py-6 text-gray-600 col-span-full"
                    >
                        Вы дошли до конца 👌
                    </div>
                </WhenVisible>
            </div>
        </div>
    </div>
</template>

<style scoped>
.ad {
    width: 100%;
    height: 350px;
    object-fit: cover;
}

.page {
    display: flex;
    align-items: flex-start;
    width: 98%;
    gap: 1%;
}

.content {
    min-width: 82%;
}

/* Сортировка */
.sorting {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    margin: 0.5rem 1rem;
    padding: 0.75rem 1.25rem;
    border-radius: 1rem;
    background: #ffffff;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
}

.sort-label {
    font-weight: 600;
    font-family: 'Arial', sans-serif;
    color: #374151;
    margin-right: 0.5rem;
}

.sort-btn {
    padding: 0.5rem 1rem;
    border-radius: 0.75rem;
    border: 1px solid #ffffff;
    background: white;
    font-size: 1rem;
    color: #374151;
    cursor: pointer;
    transition: all 0.2s ease;
}

.sort-btn:hover {
    background: #bcbec5;
}

.sort-btn.active {
    background: #2c2c2c;
    color: white;
    border-color: #4f46e5;
    font-weight: 500;
}

.order-toggle {
    margin-left: auto;
}

/* Каталог */
.catalog {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(230px, 1fr));
    gap: 8px;
    padding: 1rem;
    justify-content: center;
}
</style>
