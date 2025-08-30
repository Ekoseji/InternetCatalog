<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'cost' => $this->faker->randomFloat(2, 10, 10000),

            // Генерируем комментарии от 0 до 500
            'comments_count' => $this->faker->numberBetween(0, 500),

            // Рейтинг от 1.00 до 5.00
            'rating' => $this->faker->randomFloat(2, 1, 5),

            // Пока пустая строка для image — подставим в сидере
            'image' => '',
        ];
    }
}
