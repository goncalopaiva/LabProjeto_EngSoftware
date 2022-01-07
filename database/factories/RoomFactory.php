<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Room;

class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'idsala' => $this->faker->unique()->numberBetween(1,10),
            'tipo' => $this->faker->numberBetween(1,3),
        ];
    }
}
