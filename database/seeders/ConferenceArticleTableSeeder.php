<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class ConferenceArticleTableSeeder extends Seeder
{
    public function run()
    {
        // Define the source file path (this should be where your default file is located)
        $sourceFilePath = base_path('public/journal_publications/default.pdf');

        // Define the destination path in the storage
        $destinationPath = 'journal_publications/default.pdf';

        // Copy the file to the storage
        Storage::disk('public')->put($destinationPath, file_get_contents($sourceFilePath));

        DB::table('conferences')->insert([
            [
                'user_id'=> '1002',
                'conference_title'=> 'default',
                'title_of_paper'=> 'default',
                'status'=> 'default',
                'file_upload'=> '$destinationPath'
            ],
            [
                'user_id'=> '1003',
                'conference_title'=> 'default',
                'title_of_paper'=> 'default',
                'status'=> 'default',
                'file_upload'=> 'public/conference_publications/default.pdf'
            ],
            [
                'user_id'=> '1004',
                'conference_title'=> 'default',
                'title_of_paper'=> 'default',
                'status'=> 'default',
                'file_upload'=> 'public/conference_publications/default.pdf'
            ],
            [
                'user_id'=> '1005',
                'conference_title'=> 'default',
                'title_of_paper'=> 'default',
                'status'=> 'default',
                'file_upload'=> 'public/conference_publications/default.pdf'
            ],
            [
                'user_id'=> '1007',
                'conference_title'=> 'default',
                'title_of_paper'=> 'default',
                'status'=> 'default',
                'file_upload'=> 'public/conference_publications/default.pdf'
            ],
            [
                'user_id'=> '1008',
                'conference_title'=> 'default',
                'title_of_paper'=> 'default',
                'status'=> 'default',
                'file_upload'=> 'public/conference_publications/default.pdf'
            ],
            [
                'user_id'=> '1012',
                'conference_title'=> 'default',
                'title_of_paper'=> 'default',
                'status'=> 'default',
                'file_upload'=> 'public/conference_publications/default.pdf'
            ],
            [
                'user_id'=> '1019',
                'conference_title'=> 'default',
                'title_of_paper'=> 'default',
                'status'=> 'default',
                'file_upload'=> 'public/conference_publications/default.pdf'
            ],
        ]);
    }
}
