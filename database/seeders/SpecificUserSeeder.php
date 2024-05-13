<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class SpecificUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name' => 'Dr. Bernard Shibwabo',
            'email' => 'bshibwabo@strathmore.edu',
            'password' => Hash::make('password'),
            'role_id' => 3,
            'phone_number' => '0703034135',
            'date_of_birth' => '1990-01-01',
            'country_id' => 132,
            'religion_id' => 1,
            'gender_id' => 1,
        ]);

        User::create([
            'name' => 'Fredrick Barasa',
            'email' => 'fbarasa@strathmore.edu',
            'password' => Hash::make('password'),
            'role_id' => 3,
            'phone_number' => '0703034258',
            'date_of_birth' => '1985-05-15',
            'country_id' => 132,
            'religion_id' => 2,
            'gender_id' => 1,
        ]);

        User::create([
            'name' => 'William Kadima',
            'email' => 'wkadima@strathmore.edu',
            'password' => Hash::make('password'),
            'role_id' => 3,
            'phone_number' => '0703034297',
            'date_of_birth' => '1988-09-20',
            'country_id' => 132,
            'religion_id' => 3,
            'gender_id' => 1,
        ]);
    }
}