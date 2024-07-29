<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class NoticesMTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('notices')->insert([
            [
                'thesis_title' => '1000',
                'proposed_date' => '93646',
                'user_id' => 'active',
            ],
        ]);
    
    }
}
