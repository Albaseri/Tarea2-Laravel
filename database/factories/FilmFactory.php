<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Film>
 */
class FilmFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        fake()->addProvider(new \Mmo\Faker\PicsumProvider(fake()));

        return [
            'titulo' => fake()->unique()->words(random_int(1, 2), true),
            'descripcion' => fake()->text(),
            'imagen' => 'films/' . fake()->picsum('public/storage/films', 640, 480, false)
        ];
    }
}
