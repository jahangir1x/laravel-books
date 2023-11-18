<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
            'title'  => fake()->sentence,
            'author' => fake()->name,
            'isbn'   => fake()->isbn13,
            'price'  => fake()->randomFloat(2, 10, 100),
            'stock'  => fake()->numberBetween(1, 100),
        ];

        // for laravel 9
//        return [
//            'title'  => $this->faker->sentence,
//            'author' => $this->faker->name,
//            'isbn'   => $this->faker->isbn13,
//            'price'  => $this->faker->randomFloat(2, 10, 100),
//            'stock'  => $this->faker->numberBetween(1, 100),
//        ];



    }
}
