<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConferenceArticleTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('conferences')->insert([
            [
                'user_id'=> '1002',
                'conference_title'=> '',
                'title_of_paper'=> '',
                'status'=> '',
                'file_upload'=> '',
            ],
            [
                'user_id'=> '1003',
                'conference_title'=> '',
                'title_of_paper'=> '',
                'status'=> 'published',
                'file_upload'=> '',
            ],
            [
                'user_id'=> '1004',
                'conference_title'=> '',
                'title_of_paper'=> '',
                'status'=> 'published',
                'file_upload'=> '',
            ],
            [
                'user_id'=> '1005',
                'conference_title'=> '',
                'title_of_paper'=> '',
                'status'=> 'accepted',
                'file_upload'=> '',
            ],
            [
                'user_id'=> '1007',
                'conference_title'=> '',
                'title_of_paper'=> '',
                'status'=> '',
                'file_upload'=> '',
            ],
            [
                'user_id'=> '1008',
                'conference_title'=> '',
                'title_of_paper'=> '',
                'status'=> 'accepted',
                'file_upload'=> '',
            ],
            [
                'user_id'=> '1012',
                'conference_title'=> '',
                'title_of_paper'=> '',
                'status'=> 'accepted',
                'file_upload'=> '',
            ],
            [
                'user_id'=> '1019',
                'conference_title'=> '',
                'title_of_paper'=> '',
                'status'=> 'accepted',
                'file_upload'=> '',
            ],
        ]);
    }
}
