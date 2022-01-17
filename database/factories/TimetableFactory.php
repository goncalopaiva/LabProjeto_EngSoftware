<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;
use Faker\Factory as Faker;


class TimetableFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = Faker::create();

        $hora_inicio = $faker->numberBetween(8,20);
        $duration = $faker->numberBetween(1,3);
        $hora_fim = $hora_inicio + $duration;

        return [
            'sala' => $this->faker->numberBetween(1,10),
            'dia_semana' => $this->faker->numberBetween(1,5),
            'hora_inicio' => $hora_inicio,
            'hora_fim' => $hora_fim,
            'user' => $this->faker->numberBetween(1,10),
        ];
    }
}
