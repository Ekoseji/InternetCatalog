<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Support\Arr;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // Загружаем JSON
        $json = file_get_contents(database_path('seeders/products.json'));
        $data = json_decode($json, true);

        // Словарь прилагательных для заголовков
        $adjectives = [
            'Modern', 'Cozy', 'Elegant', 'Minimalist',
            'Classic', 'Stylish', 'Comfortable',
            'Luxury', 'Rustic', 'Chic'
        ];

        foreach ($data as $tagName => $items) {
            // Создаём/находим основной тег (например: "sofa", "chair")
            $tag = Tag::firstOrCreate(['name' => $tagName]);

            foreach ($items as $item) {
                // Заголовок: прилагательное + тег
                $title = Arr::random($adjectives) . ' ' . ucfirst($tagName);

                // Создаём продукт
                $product = Product::create([
                    'title' => $title,
                    'cost' => rand(10, 2000) * 5,
                    'comments_count' => rand(0, 500),
                    'rating' => rand(100, 500) / 100, // рейтинг от 1.0 до 5.0
                    'image' => $item['url_medium'],
                ]);

                // Присваиваем основной тег
                $product->tags()->attach($tag->id);

                // 🔥 Общий тег (например "furniture")
                $commonTagName = 'furniture';
                $commonTag = Tag::firstOrCreate(['name' => $commonTagName]);

                // Присваиваем общий тег
                $product->tags()->attach($commonTag->id);
            }
        }
    }
}
