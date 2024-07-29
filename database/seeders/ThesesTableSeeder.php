<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThesesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('defense')->insert([
            [
                'Defense Date' => '17-Dec-2021',
                'Defense Decision' => 'Passed with minor corrections',
                'Comments' => 'Too long. Medical doctor.',
            ],

            [
                'Defense Date' => '13-Apr-2023',
                'Defense Decision' => 'Passed with major corrections',
                'Comments' => 'Corrections not submitted yet.',
            ],

            [
                'Defense Date' => '14-Jun-2022',
                'Defense Decision' => 'Passed with major corrections',
                'Comments' => 'Corrections approved by the examiners.',
            ],

            [
                'Defense Date' => '7-Aug-2023',
                'Defense Decision' => 'Passed with minor corrections',
                'Comments' => 'Pending clarification on the Case publication.',
            ],

            [
                'Defense Date' => '19-Oct-2023',
                'Defense Decision' => 'Passed with major corrections',
                'Comments' => 'Corrections approved by the examiners.',
            ],

            [
                'Defense Date' => '16-Nov-2023',
                'Defense Decision' => 'Passed with major corrections',
                'Comments' => 'Submitted revised Thesis on 17th May 2024. Dispatched to the Examiner.',
            ],

            [
                'Defense Date' => '14-Dec-2023',
                'Defense Decision' => 'Passed with minor corrections',
                'Comments' => 'Submitted revised Thesis on 23rd May 2024. Pending approval.',
            ],

            [
                'Defense Date' => '14-Dec-2023',
                'Defense Decision' => 'Passed with minor corrections',
                'Comments' => 'Submitted revised Thesis.',
            ],

            [
                'Defense Date' => '4-Apr-2024',
                'Defense Decision' => 'Passed with minor corrections',
                'Comments' => 'Yet to Submit the revised Thesis.',
            ],

            [
                'Defense Date' => 'Awaiting',
                'Defense Decision' => '',
                'Comments' => '',
            ],

            [
                'Defense Date' => '17-Jul-2024',
                'Defense Decision' => 'Passed with minor corrections',
                'Comments' => '',
            ],

            [
                'Defense Date' => '11-Jul-2024',
                'Defense Decision' => 'Passed with minor corrections',
                'Comments' => '',
            ],

            [
                'Defense Date' => '18-Jul-2024',
                'Defense Decision' => 'Passed with minor corrections',
                'Comments' => '',
            ],

            [
                'Defense Date' => '18-Jul-2024',
                'Defense Decision' => 'Passed with minor corrections',
                'Comments' => '',
            ],
        ]);
    }
}
