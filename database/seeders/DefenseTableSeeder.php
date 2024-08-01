<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DefenseTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('defense')->insert([
            [
                'user_id' => '1000',
                'Defense Date' => '17-Dec-2021',
                'Defense Decision' => 'Passed with minor corrections',
                'Comments' => 'Too long. Medical doctor.',
            ],
            [
                'user_id' => '1001',
                'Defense Date' => '13-Apr-2023',
                'Defense Decision' => 'Passed with major corrections',
                'Comments' => 'Corrections not submitted yet.',
            ],
            [
                'user_id' => '1002',
                'Defense Date' => '14-Jun-2022',
                'Defense Decision' => 'Passed with major corrections',
                'Comments' => 'Corrections approved by the examiners.',
            ],
            [
                'user_id' => '1003',
                'Defense Date' => '7-Aug-2023',
                'Defense Decision' => 'Passed with minor corrections',
                'Comments' => 'Pending clarification on the Case publication.',
            ],
            [
                'user_id' => '1004',
                'Defense Date' => '19-Oct-2023',
                'Defense Decision' => 'Passed with major corrections',
                'Comments' => 'Corrections approved by the examiners.',
            ],
            [
                'user_id' => '1005',
                'Defense Date' => '16-Nov-2023',
                'Defense Decision' => 'Passed with major corrections',
                'Comments' => 'Submitted revised Thesis on 17th May 2024. Dispatched to the Examiner.',
            ],
            [
                'user_id' => '1006',
                'Defense Date' => '14-Dec-2023',
                'Defense Decision' => 'Passed with minor corrections',
                'Comments' => 'Submitted revised Thesis on 23rd May 2024. Pending approval.',
            ],
            [
                'user_id' => '1007',
                'Defense Date' => '14-Dec-2023',
                'Defense Decision' => 'Passed with minor corrections',
                'Comments' => 'Submitted revised Thesis.',
            ],
            [
                'user_id' => '1008',
                'Defense Date' => '4-Apr-2024',
                'Defense Decision' => 'Passed with minor corrections',
                'Comments' => 'Yet to Submit the revised Thesis.',
            ],
            [
                'user_id' => '1010',
                'Defense Date' => '17-Jul-2024',
                'Defense Decision' => 'Passed with minor corrections',
                'Comments' => 'No Comments',
            ],
            [
                'user_id' => '1011',
                'Defense Date' => '11-Jul-2024',
                'Defense Decision' => 'Passed with minor corrections',
                'Comments' => 'No Comments',
            ],
            [
                'user_id' => '1012',
                'Defense Date' => '18-Jul-2024',
                'Defense Decision' => 'Passed with minor corrections',
                'Comments' => 'No Comments',
            ],
            [
                'user_id' => '1013',
                'Defense Date' => '18-Jul-2024',
                'Defense Decision' => 'Passed with minor corrections',
                'Comments' => 'No Comments',
            ],
        ]);
    }
}
