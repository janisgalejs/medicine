<?php

namespace Database\Seeders;

use Database\Seeders\Medicine\MedicineSeeder;
use Database\Seeders\Medicine\ScheduleSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            MedicineSeeder::class,
            ScheduleSeeder::class
        ]);
    }
}
