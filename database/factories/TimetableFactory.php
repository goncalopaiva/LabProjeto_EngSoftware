<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TimetableFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sala' => $this->faker->numberBetween(1,10),
            'dia_semana' => $this->faker->numberBetween(1,5),
            'hora_inicio' => $this->faker->numberBetween(8,20),
        ];
    }
}
