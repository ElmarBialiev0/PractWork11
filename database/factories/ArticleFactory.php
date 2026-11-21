<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(6),
            'image' => 'https://picsum.photos/800/400',
            'description' => fake()->paragraphs(3, true),
            'author' => fake()->name(),
        ];
    }
}
