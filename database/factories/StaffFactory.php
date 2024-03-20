<?php

namespace Database\Factories;

use App\Models\Staff;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class StaffFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Staff::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'curriculum_vitae' => 'cv/default.pdf', // Set a default CV path
            'school_id' => $this->faker->numberBetween(1, 5), // Assuming you have 5 schools
            'user_id' => function () {
                return User::factory()->create()->id;
            },
        ];
    }
}
