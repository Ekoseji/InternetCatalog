<script setup>
import { Link } from "@inertiajs/vue3";

const props = defineProps({
    product: Object
});
</script>

<template>
    <article class="card">
        <Link href="">
            <div class="content">

                <!-- Верхняя часть с картинкой -->
                <div class="up">
                    <img class="img" :src="props.product.image" alt="Не удалось загрузить изображение"/>
                </div>

                <!-- Нижняя часть с текстом -->
                <div class="bottom">
                    <div class="title">{{ props.product.title }}</div>
                    <div class="cost">{{ props.product.cost }} ₽</div>
                    <div class="metrics">
                        <div>
                            <img class="icons" src="../../../public/3.png" alt=""/>
                            {{ props.product.rating }}
                        </div>
                        <div>
                            <img class="iconComment" src="../../../public/2.png" alt=""/>
                            {{ props.product.comments_count }}
                        </div>
                    </div>
                </div>

            </div>
        </Link>
    </article>
</template>

<style scoped>
.card {
    font-family: 'Arial', sans-serif;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    background-color: #ffffff;
    display: flex;
    flex-direction: column;
    border-radius: 0.5rem;
    width: 230px;
    height: 440px;
    transition: transform 0.3s, box-shadow 0.3s;
}

.card:hover {
    transform: translateY(-3px);
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
}

.card a {
    text-decoration: none;
    color: inherit;
    display: flex;
    flex-direction: column;
    height: 100%;
}

.content {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    height: 100%;
    padding: 0.75rem;
}

/* фиксированная зона под картинку */
.up {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 300px;   /* одинаковая высота */
    margin-bottom: 0.5rem;
    flex-shrink: 0;
}

/* сама картинка заполняет блок */
.img {
    width: 100%;
    height: 100%;
    object-fit: cover;   /* одинаковый размер, лишнее обрезается */
    border-radius: 0.5rem;
}

/* Нижняя часть с текстом */
.bottom {
    display: flex;
    flex-direction: column;
    gap: 0.4rem;
    flex-shrink: 0;
}

/* Название */
.title {
    font-weight: 600;
    font-size: 0.95rem;
    color: #333;
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
}

/* Цена */
.cost {
    font-size: 1rem;
    font-weight: 700;
    color: #4a90e2;
}

/* Метрики */
.metrics {
    display: flex;
    justify-content: space-between;
    font-size: 0.85rem;
    color: #666;
}

.metrics div:first-child,
.metrics div:last-child {
    display: flex;
    align-items: center;
    gap: 0.2rem;
}

.iconComment {
    filter: grayscale(100%);
    width: 20px;
    height: 20px;
}

.icons {
    width: 15px;
    height: 15px;
}
</style>
