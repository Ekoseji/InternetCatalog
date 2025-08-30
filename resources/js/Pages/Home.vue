<script setup>

import Main from "@/Layouts/Main.vue";
import ProductCard from "@/components/ProductCard.vue";
import SideBarFilters from "@/components/SideBarFilters.vue";

defineOptions({
    layout: Main
});

const props = defineProps({
    products: Array
})

</script>

<template>
    <div class="content">
        <SideBarFilters></SideBarFilters>
        <div class="catalog">
            <ProductCard class="card" v-for="product in props.products" :key="product.id" :product="product"/>
        </div>
    </div>
</template>

<style scoped>
.content {
    display: flex;
    align-items: flex-start;
    width: 98%;
    gap: 1%;
    margin: 1rem;
}

.catalog {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(188px, 1fr));
    gap: 8px;          /* промежутки между карточками */
    padding: 1rem;
    justify-content: center;
    max-width: 82%;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    border-radius: 1rem;
}
</style>
