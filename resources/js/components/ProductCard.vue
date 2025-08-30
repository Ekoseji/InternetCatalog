<script setup>
import {Link} from "@inertiajs/vue3";

const props = defineProps({
    product: Object
});
</script>

<template>
    <article class="card">
        <Link href="">
            <div class="content">

                <div class="up">
                    <img class="img" :src="props.product.image" alt='Не удалось загрузить изображение'/>
                </div>

                <div class="bottom">
                    <div class="cost">{{ props.product.cost }} ₽</div>
                    <div>{{ props.product.title }}</div>
                    <div class="metrics">
                        <div>⭐{{ props.product.rating }}</div>
                        <div>💬{{ props.product.comments_count }}</div>
                    </div>
                </div>

            </div>
        </Link>
    </article>
</template>

<style scoped>

.up {
    flex: 1; /* занимает всё доступное пространство сверху */
    display: flex;
    justify-content: center; /* по горизонтали */
    flex-direction: column;
    gap: 0.5rem;
}
.metrics {
    display: flex;
    justify-content: space-between;
}

.content {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    height: 100%;
}

.card a {
    text-decoration: none;
    color: inherit;
}

.card {
    font-family: Arial;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    background-color: #ffffff;
    display: flex;
    padding: 1rem;
    border-radius: 0.5rem;
    width: 188px;
    height: 340px;
}

.cost {
    font-size: 1.2rem;
}

.img {
    display: flex;
    width: 156px;
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
}
</style>
