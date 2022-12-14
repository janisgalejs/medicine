<?php

namespace Database\Factories\Medicine;

use App\Models\Medicine\Medicine;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MedicineFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Medicine::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $startDate = $this->faker->dateTimeBetween('now', '+10 days');

        return [
            'user_id' => User::all()->random()->id,
            'name' => $this->faker->text(50),
            'description' => $this->faker->text(191),
            'status' => $this->faker->numberBetween(0, 1),
            'number_of_items_left' => $this->faker->numberBetween(0, 100),
            'date_start' => $startDate,
            'date_end' => $this->faker->dateTimeBetween($startDate, '+6 months')
        ];
    }
}
