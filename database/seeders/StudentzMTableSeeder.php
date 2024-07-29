<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentzMTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('students')->insert([
            [
                'user_id' => '1000',
                'student_number' => '93646',
                'academic_status' => 'active',
                'program_id'=>'13',
                'start_date' => '2018-01-01',
            ],
            [
                'user_id' => '1001',
                'student_number' => '62373',
                'academic_status' => 'active',
                'program_id'=>'1',
                'start_date' => '2018-01-01',
            ],
            [
                'user_id' => '1002',
                'student_number' => '72445',
                'academic_status' => 'active',
                'program_id'=>'1',
                'start_date' => '2018-01-01',
            ],
            [
                'user_id' => '1003',
                'student_number' => '77653',
                'academic_status' => 'active',
                'program_id'=>'1',
                'start_date' => '2018-01-01',
            ],
            [
                'user_id' => '1004',
                'student_number' => '46340',
                'academic_status' => 'active',
                'program_id'=>'1',
                'start_date' => '2018-01-01',
            ],
            [
                'user_id' => '1005',
                'student_number' => '82806',
                'academic_status' => 'active',
                'program_id'=>'1',
                'start_date' => '2018-01-01',
            ],
            [
                'user_id' => '1006',
                'student_number' => '103789',
                'academic_status' => 'active',
                'program_id'=>'1',
                'start_date' => '2018-01-01',
            ],
            [
                'user_id' => '1007',
                'student_number' => '90079',
                'academic_status' => 'active',
                'program_id'=>'13',
                'start_date' => '2018-01-01',
            ],
            [
                'user_id' => '1008',
                'student_number' => '123086',
                'academic_status' => 'active',
                'program_id'=>'1',
                'start_date' => '2018-01-01',
            ],
            [
                'user_id' => '1009',
                'student_number' => '13058',
                'academic_status' => 'active',
                'program_id'=>'1',
                'start_date' => '2018-01-01',
            ],
            [
                'user_id' => '1010',
                'student_number' => '45565',
                'academic_status' => 'active',
                'program_id'=>'1',
                'start_date' => '2018-01-01',
            ],
            [
                'user_id' => '1011',
                'student_number' => '33173',
                'academic_status' => 'active',
                'program_id'=>'1',
                'start_date' => '2018-01-01',
            ],
            [
                'user_id' => '1012',
                'student_number' => '77998',
                'academic_status' => 'active',
                'program_id'=>'15',
                'start_date' => '2018-01-01',
            ],
            [
                'user_id' => '1013',
                'student_number' => '121666',
                'academic_status' => 'active',
                'program_id'=>'1',
                'start_date' => '2018-01-01',
            ],
            [
                'user_id' => '1014',
                'student_number' => '137671',
                'academic_status' => 'active',
                'program_id'=>'13',
                'start_date' => '2018-01-01',
            ],
            [
                'user_id' => '1015',
                'student_number' => '96221',
                'academic_status' => 'active',
                'program_id'=>'13',
                'start_date' => '2018-01-01',
            ],
            [
                'user_id' => '1016',
                'student_number' => '213747',
                'academic_status' => 'active',
                'program_id'=>'1',
                'start_date' => '2018-01-01',
            ],
            [
                'user_id' => '1017',
                'student_number' => '22129',
                'academic_status' => 'active',
                'program_id'=>'11',
                'start_date' => '2018-01-01',
            ],
            [
                'user_id' => '1018',
                'student_number' => '102709',
                'academic_status' => 'active',
                'program_id'=>'1',
                'start_date' => '2018-01-01',
            ],
            [
                'user_id' => '1019',
                'student_number' => '62631',
                'academic_status' => 'active',
                'program_id'=>'15',
                'start_date' => '2018-01-01',
            ],
            [
                'user_id' => '1020',
                'student_number' => '138922',
                'academic_status' => 'active',
                'program_id'=>'15',
                'start_date' => '2018-01-01',
            ],
            [
                'user_id' => '1021',
                'student_number' => '72015',
                'academic_status' => 'active',
                'program_id'=>'1',
                'start_date' => '2018-01-01',
            ],
            [
                'user_id' => '1022',
                'student_number' => '153097',
                'academic_status' => 'active',
                'program_id'=>'1',
                'start_date' => '2018-01-01',
            ],
            [
                'user_id' => '1023',
                'student_number' => '71035',
                'academic_status' => 'active',
                'program_id'=>'1',
                'start_date' => '2018-01-01',
            ],
            [
                'user_id' => '1024',
                'student_number' => '152981',
                'academic_status' => 'active',
                'program_id'=>'1',
                'start_date' => '2018-01-01',
            ],
            [
                'user_id' => '1025',
                'student_number' => '153426',
                'academic_status' => 'active',
                'program_id'=>'1',
                'start_date' => '2018-01-01',
            ],
            [
                'user_id' => '1026',
                'student_number' => '165803',
                'academic_status' => 'active',
                'program_id'=>'1',
                'start_date' => '2018-01-01',
            ],
            [
                'user_id' => '1027',
                'student_number' => '152980',
                'academic_status' => 'active',
                'program_id'=>'1',
                'start_date' => '2018-01-01',
            ],
        ]);
    }
}
