<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence;
        return [
            'title' => $title,
            'content' => $this->faker->paragraph(3,true),
            'slug' => Str::slug($title),
            'image' => $this->faker->imageUrl(640, 480, 'post', true),
            'reading_time' => $this->faker->numberBetween(1, 10),
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
        ];
    }
}
