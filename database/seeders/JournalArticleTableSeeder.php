<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class JournalArticleTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('journals')->insert([
            [
                'user_id'=> '1002',
                'journal_title'=> 'default',
                'title_of_paper'=> 'default',
                'status'=> 'default',
                'file_upload'=> 'public/journal_publications/default.pdf'
            ],
            [
                'user_id'=> '1003',
                'journal_title'=> 'default',
                'title_of_paper'=> 'default',
                'status'=> 'default',
                'file_upload'=> 'public/journal_publications/default.pdf'
            ],
            [
                'user_id'=> '1003',
                'journal_title'=> 'default',
                'title_of_paper'=> 'default',
                'status'=> 'default',
                'file_upload'=> 'public/journal_publications/default.pdf'
            ],
            [
                'user_id'=> '1005',
                'journal_title'=> 'default',
                'title_of_paper'=> 'default',
                'status'=> 'default',
                'file_upload'=> 'public/journal_publications/default.pdf'
            ],
            [
                'user_id'=> '1006',
                'journal_title'=> 'default',
                'title_of_paper'=> 'default',
                'status'=> 'default',
                'file_upload'=> 'public/journal_publications/default.pdf'
            ],
            [
                'user_id'=> '1007',
                'journal_title'=> 'default',
                'title_of_paper'=> 'default',
                'status'=> 'default',
                'file_upload'=> 'public/journal_publications/default.pdf'
            ],
            [
                'user_id'=> '1008',
                'journal_title'=> 'default',
                'title_of_paper'=> 'default',
                'status'=> 'default',
                'file_upload'=> 'public/journal_publications/default.pdf'
            ],
            [
                'user_id'=> '1010',
                'journal_title'=> 'default',
                'title_of_paper'=> 'default',
                'status'=> 'default',
                'file_upload'=> 'public/journal_publications/default.pdf'
            ],
            [
                'user_id'=> '1012',
                'journal_title'=> 'default',
                'title_of_paper'=> 'default',
                'status'=> 'default',
                'file_upload'=> 'public/journal_publications/default.pdf'
            ],
            [
                'user_id'=> '1014',
                'journal_title'=> 'default',
                'title_of_paper'=> 'default',
                'status'=> 'default',
                'file_upload'=> 'public/journal_publications/default.pdf'
            ],
            [
                'user_id'=> '1015',
                'journal_title'=> 'default',
                'title_of_paper'=> 'default',
                'status'=> 'default',
                'file_upload'=> 'public/journal_publications/default.pdf'
            ],
            [
                'user_id'=> '1019',
                'journal_title'=> 'default',
                'title_of_paper'=> 'default',
                'status'=> 'default',
                'file_upload'=> 'public/journal_publications/default.pdf'
            ],
            [
                'user_id'=> '1020',
                'journal_title'=> 'default',
                'title_of_paper'=> 'default',
                'status'=> 'default',
                'file_upload'=> 'public/journal_publications/default.pdf'
            ],
        ]);
    }
}
