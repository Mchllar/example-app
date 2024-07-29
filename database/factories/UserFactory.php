<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

  
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'profile' => 'public/images/user.png', // Set a default profile image path
            'role_id' => $this->faker->randomElement([1, 2, 3]),
            'date_of_birth' => $this->faker->date,
            'phone_number' => $this->faker->phoneNumber,
            'gender_id' => $this->faker->numberBetween(1, 2), // Assuming gender IDs are 1 and 2
            'country_id' => $this->faker->numberBetween(1, 10), // Assuming you have 10 countries
            'religion_id' => $this->faker->numberBetween(1, 5), // Assuming you have 5 religions
            'password' => Hash::make('password'), // Default password is 'password'
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
