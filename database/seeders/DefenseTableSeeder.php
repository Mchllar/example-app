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
                'user_id' => '2031',
                'defense_date' => '17-Dec-2021',
                'defense_decision' => 'Passed with minor corrections',
                'comments' => 'Too long. Medical doctor.',
            ],
            [
                'user_id' => '1001',
                'defense_date' => '13-Apr-2023',
                'defense_decision' => 'Passed with major corrections',
                'comments' => 'Corrections not submitted yet.',
            ],
            [
                'user_id' => '1002',
                'defense_date' => '14-Jun-2022',
                'defense_decision' => 'Passed with major corrections',
                'comments' => 'Corrections approved by the examiners.',
            ],
            [
                'user_id' => '1003',
                'defense_date' => '7-Aug-2023',
                'defense_decision' => 'Passed with minor corrections',
                'comments' => 'Pending clarification on the Case publication.',
            ],
            [
                'user_id' => '1004',
                'defense_date' => '19-Oct-2023',
                'defense_decision' => 'Passed with major corrections',
                'comments' => 'Corrections approved by the examiners.',
            ],
            [
                'user_id' => '1005',
                'defense_date' => '16-Nov-2023',
                'defense_decision' => 'Passed with major corrections',
                'comments' => 'Submitted revised Thesis on 17th May 2024. Dispatched to the Examiner.',
            ],
            [
                'user_id' => '1006',
                'defense_date' => '14-Dec-2023',
                'defense_decision' => 'Passed with minor corrections',
                'comments' => 'Submitted revised Thesis on 23rd May 2024. Pending approval.',
            ],
            [
                'user_id' => '1007',
                'defense_date' => '14-Dec-2023',
                'defense_decision' => 'Passed with minor corrections',
                'comments' => 'Submitted revised Thesis.',
            ],
            [
                'user_id' => '1008',
                'defense_date' => '4-Apr-2024',
                'defense_decision' => 'Passed with minor corrections',
                'comments' => 'Yet to Submit the revised Thesis.',
            ],
            [
                'user_id' => '1010',
                'defense_date' => '17-Jul-2024',
                'defense_decision' => 'Passed with minor corrections',
                'comments' => 'No Comments',
            ],
            [
                'user_id' => '1011',
                'defense_date' => '11-Jul-2024',
                'defense_decision' => 'Passed with minor corrections',
                'comments' => 'No Comments',
            ],
            [
                'user_id' => '1012',
                'defense_date' => '18-Jul-2024',
                'defense_decision' => 'Passed with minor corrections',
                'comments' => 'No Comments',
            ],
            [
                'user_id' => '1013',
                'defense_date' => '18-Jul-2024',
                'defense_decision' => 'Passed with minor corrections',
                'comments' => 'No Comments',
            ],
        ]);
    }
}
