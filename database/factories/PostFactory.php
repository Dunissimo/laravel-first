<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'content' => $this->faker->text,
            'image' => $this->faker->imageUrl,
            'likes' => random_int(0, 2000),
            'is_published' => 0,
            'category_id' => Category::get()->random()->id,
        ];
    }
}
