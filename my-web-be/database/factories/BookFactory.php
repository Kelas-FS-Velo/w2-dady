<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3),
            'author' => fake()->name(),
            'isbn' => Str::random(13),
            'category' => fake()->randomElement(['Fiction', 'Non-Fiction', 'Sci-Fi', 'Fantasy']),
            'published_year' => fake()->year(),
            'stock' => fake()->numberBetween(1, 50),
        ];
    }
}
