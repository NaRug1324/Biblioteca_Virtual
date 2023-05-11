<?php

namespace Database\Factories;

use App\Models\Libro;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Prestamo>
 */
class PrestamoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fecha_solicitud' => $this->faker->dateTimeBetween($startDate = '-2 month', $endDate = 'now'),
            'fecha_prestamo' => $this->faker->dateTimeBetween($startDate = '-1 month', $endDate = 'now'),
            'fecha_devolucion' => $this->faker->dateTimeBetween($startDate = 'now', $endDate = '+3 month'),
            'libro_id'=> Libro::inRandomOrder()->first()->id,
            'usuario_id'=> Usuario::inRandomOrder()->first()->id,
        ];
    }
}
