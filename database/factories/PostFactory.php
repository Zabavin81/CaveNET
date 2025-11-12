<?php

namespace Database\Factories;

use App\Http\Resources\Models\Category;
use App\Http\Resources\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Http\Resources\Models\Post>
 */
class PostFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title" => fake()->realText(50,5) ,
            "body" => fake()->realText(250,5),
            "likes" => fake()->numberBetween(100,1000),
            "is_published" => fake()->boolean,
            "views" => fake()->numberBetween(1000,5000),
            "published_at" => fake()->date("Y-m-d H:i:s"),
            "profile_id" => Profile::InRandomOrder()->first()->id,
            "category_id" => Category::InRandomOrder()->first()->id
        ];
    }

}
