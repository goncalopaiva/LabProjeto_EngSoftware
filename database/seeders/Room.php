<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class Room extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Room::factory(20)->create();
    }
}
