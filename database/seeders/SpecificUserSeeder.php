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
            'profile' => 'images/default.jpg',
            'password' => Hash::make('pass1234'),
            'role_id' => 3,
            'phone_number' => '0703034135',
            'date_of_birth' => '1984-09-02',
            'country_id' => 132,
            'religion_id' => 1,
            'gender_id' => 1,
        ]);

        User::create([
            'name' => 'Fredrick Barasa',
            'email' => 'fbarasa@strathmore.edu',
            'profile' => 'images/default.jpg',
            'password' => Hash::make('pass1234'),
            'role_id' => 3,
            'phone_number' => '0703034258',
            'date_of_birth' => '1989-01-23',
            'country_id' => 132,
            'religion_id' => 2,
            'gender_id' => 1,
        ]);

        User::create([
            'name' => 'William Kadima',
            'email' => 'wkadima@strathmore.edu',
            'profile' => 'images/default.jpg',
            'password' => Hash::make('pass1234'),
            'role_id' => 3,
            'phone_number' => '0703034297',
            'date_of_birth' => '1988-01-12',
            'country_id' => 132,
            'religion_id' => 3,
            'gender_id' => 1,
        ]);
        User::create([
            'name' => 'Dr. David',
            'email' => 'doloo2820@gmail.com',
            'profile' => 'images/default.jpg',
            'password' => Hash::make('pass1234'),
            'role_id' => 3,
            'phone_number' => '0703034297',
            'date_of_birth' => '2002-01-08',
            'country_id' => 132,
            'religion_id' => 3,
            'gender_id' => 1,
        ]);
        User::create([
            'name' => 'Michelle',
            'email' => 'michelle.guya@strathmore.edu',
            'profile' => 'images/default.jpg',
            'password' => Hash::make('pass1234'),
            'role_id' => 3,
            'phone_number' => '0703034297',
            'date_of_birth' => '2001-03-12',
            'country_id' => 132,
            'religion_id' => 3,
            'gender_id' => 2,
        ]);
    }
}