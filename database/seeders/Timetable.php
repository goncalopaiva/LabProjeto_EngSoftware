<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class Timetable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Timetable::factory(50)->create();
    }
}
