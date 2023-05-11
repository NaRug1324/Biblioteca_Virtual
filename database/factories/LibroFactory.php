<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Libro>
 */
class LibroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo' => $this->faker->sentence(4),
            'autor' => $this->faker->name,
            'editorial' => $this->faker->word,
            'anio_publicado' => $this->faker->date($format = 'd-m-Y', $max = 'now'),
            'cantidad_dispo' => $this->faker->randomNumber($nbDigits = NULL, $strict = false),
        ];
    }
}
