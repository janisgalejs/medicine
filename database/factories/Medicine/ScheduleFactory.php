<?php

namespace Database\Factories\Medicine;

use App\Models\Medicine\Medicine;
use App\Models\Medicine\Schedule;
use Illuminate\Database\Eloquent\Factories\Factory;

class ScheduleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Schedule::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'medicine_id' => Medicine::all()->random()->id,
            'date' => $this->faker->dateTimeBetween('now', '+10 days'),
            'time' => $this->faker->time(),
            'number_of_items_to_take' => $this->faker->numberBetween(1, 3),
            'description' => $this->faker->text(100)
        ];
    }
}
