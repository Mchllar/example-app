<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ThesisMTableSeeder extends Seeder
{
  
    public function run()
    {
        DB::table('notices')->insert([
            [
                'user_id' => '1000',
                'submission_type' => '',
                'thesis_document' => '',
                'correction_form' => '',
                'correction_summary' => '',
                'created_at' => '2021-03-05',
                'updated_at' => '2021-03-05',
            ],
        ]);
    }
}
