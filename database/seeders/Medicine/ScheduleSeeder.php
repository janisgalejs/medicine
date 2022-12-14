<?php

namespace Database\Seeders\Medicine;

use App\Models\Medicine\Schedule;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schedule::factory()->count(400)->create();
    }
}
