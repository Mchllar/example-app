<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JournalArticleTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('journals')->insert([
            [
                'user_id'=> '1002',
                'journal_title'=> '',
                'title_of_paper'=> '',
                'status'=> '',
                'file_upload'=> '',
            ],
            [
                'user_id'=> '1003',
                'journal_title'=> '',
                'title_of_paper'=> '',
                'status'=> 'published',
                'file_upload'=> '',
            ],
            [
                'user_id'=> '1003',
                'journal_title'=> '',
                'title_of_paper'=> '',
                'status'=> 'published',
                'file_upload'=> '',
            ],
            [
                'user_id'=> '1005',
                'journal_title'=> '',
                'title_of_paper'=> '',
                'status'=> 'published',
                'file_upload'=> '',
            ],
            [
                'user_id'=> '1006',
                'journal_title'=> '',
                'title_of_paper'=> '',
                'status'=> '',
                'file_upload'=> '',
            ],
            [
                'user_id'=> '1007',
                'journal_title'=> '',
                'title_of_paper'=> '',
                'status'=> '',
                'file_upload'=> '',
            ],
            [
                'user_id'=> '1008',
                'journal_title'=> '',
                'title_of_paper'=> '',
                'status'=> 'accepted',
                'file_upload'=> '',
            ],
            [
                'user_id'=> '1010',
                'journal_title'=> '',
                'title_of_paper'=> '',
                'status'=> '',
                'file_upload'=> '',
            ],
            [
                'user_id'=> '1012',
                'journal_title'=> '',
                'title_of_paper'=> '',
                'status'=> 'published',
                'file_upload'=> '',
            ],
            [
                'user_id'=> '1014',
                'journal_title'=> '',
                'title_of_paper'=> '',
                'status'=> '',
                'file_upload'=> '',
            ],
            [
                'user_id'=> '1015',
                'journal_title'=> '',
                'title_of_paper'=> '',
                'status'=> 'published',
                'file_upload'=> '',
            ],
            [
                'user_id'=> '1019',
                'journal_title'=> '',
                'title_of_paper'=> '',
                'status'=> 'published',
                'file_upload'=> '',
            ],
            [
                'user_id'=> '1020',
                'journal_title'=> '',
                'title_of_paper'=> '',
                'status'=> 'published',
                'file_upload'=> '',
            ],
        ]);
    }
}
