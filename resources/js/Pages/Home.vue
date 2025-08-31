<script setup>
import { ref, onMounted, onBeforeUnmount } from "vue";
import { Inertia } from "@inertiajs/inertia";

import Main from "@/Layouts/Main.vue";
import ProductCard from "@/components/ProductCard.vue";
import SideBarFilters from "@/components/SideBarFilters.vue";

defineOptions({
    layout: Main
});

// props от сервера, products — объект с пагинацией
const props = defineProps({
    products: Object
});

// список всех товаров
const productsList = ref([...props.products.data]);

// ссылка на следующую страницу
const nextPageUrl = ref(props.products.next_page_url);

// функция подгрузки следующей страницы
function loadNextPage() {
    if (!nextPageUrl.value) return;

    Inertia.visit(nextPageUrl.value, {
        preserveState: true,
        preserveScroll: true,
        onSuccess: page => {
            productsList.value.push(...page.props.products.data);
            nextPageUrl.value = page.props.products.next_page_url;
        }
    });
}

// обработчик скролла
function handleScroll() {
    const scrollBottom = window.innerHeight + window.scrollY;
    const docHeight = document.documentElement.offsetHeight;

    if (scrollBottom >= docHeight - 100) {
        loadNextPage();
    }
}

onMounted(() => {
    window.addEventListener("scroll", handleScroll);
});

onBeforeUnmount(() => {
    window.removeEventListener("scroll", handleScroll);
});
</script>

<template>
    <img src="../../../public/1.png" alt="" class="ad"/>
    <div class="content">
        <SideBarFilters/>
        <div class="catalog">
            <ProductCard
                class="card"
                v-for="product in productsList"
                :key="product.id"
                :product="product"
            />
        </div>
    </div>
</template>

<style scoped>
.ad {
    width: 100%;
    height: 350px;
    object-fit: cover;
}

.content {
    display: flex;
    align-items: flex-start;
    width: 98%;
    gap: 1%;
}

.catalog {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(230px, 1fr));
    gap: 8px;
    padding: 1rem;
    justify-content: center;
    max-width: 82%;
}
</style>

