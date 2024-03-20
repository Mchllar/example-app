<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Student;
use App\Models\Staff;
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
        // Create 10 users with associated roles
        User::factory(10)->create()->each(function ($user) {
            if ($user->role_id == 1) {
                Student::factory()->create(['user_id' => $user->id]);
            } elseif ($user->role_id == 2) {
                Staff::factory()->create(['user_id' => $user->id]);
            }
        });
    }
}
