<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Block>
 */
class BlockFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "Title"=>fake()->sentence(10),
            "Content"=>fake()->randomHTML(3),
            // "TopicId"=>fake()->,
            "imagePath"=>fake()->imageUrl()


        ];
    }
}