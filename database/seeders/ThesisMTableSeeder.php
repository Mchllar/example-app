<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThesisMTableSeeder extends Seeder
{
    public function run()
    {
        $dates = [
            '2021-07-21',
            '2022-11-30',
            '2023-03-08',
            '2023-01-26',
            '2023-03-06',
            '2023-03-01',
            '2023-05-30',
            '2023-09-12',
            '2023-08-30',
            '2023-12-11',
            '2024-02-06',
            '2024-01-31',
            '2024-02-26',
            '2023-12-18',
            '2024-02-07',
            '2024-06-11'
        ];

        $userSubmissions = [];

        $ids = array_merge(range(1000, 1014), [1020]);

        foreach ($ids as $index => $id) {
            $date = $dates[$index];
            $userSubmissions[] = [
                'user_id' => $id,
                'submission_type' => '2',
                'thesis_document' => '/public/thesis_documents/default.pdf',
                'correction_form' => '/public/correction_forms/default.pdf',
                'correction_summary' => '/public/correction_summaries/default.pdf',
                'created_at' => $date,
                'updated_at' => $date,
            ];
        }

        DB::table('theses')->insert($userSubmissions);
    }

}
