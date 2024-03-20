<?php

namespace Database\Factories;

use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'student_number' => $this->faker->unique()->numberBetween(1000, 9999),
            'program_id' => $this->faker->numberBetween(1, 10), // Assuming you have 10 programs
            'user_id' => function () {
                return User::factory()->create()->id;
            },
        ];
    }
}
