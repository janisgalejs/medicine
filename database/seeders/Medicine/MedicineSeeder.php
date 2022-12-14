<?php

namespace Database\Seeders\Medicine;

use App\Models\Medicine\Medicine;
use Illuminate\Database\Seeder;

class MedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Medicine::factory()->count(200)->create();
    }
}
