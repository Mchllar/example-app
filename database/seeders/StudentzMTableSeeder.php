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
                'student_number' => '62373',
                'academic_status' => 'active',
                'program_id'=>'1',
                'year_of_admission' => '2019',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030',
                'user_id' => '1001'
            ],
            [
                'student_number' => '72445',
                'academic_status' => 'active',
                'program_id'=>'1',
                'year_of_admission' => '2017',
                'year_of_registration' => '2019',
                'year_of_graduation' =>'2030',
                'user_id' => '1002'
            ],
            [
                'user_id' => '1003',
                'student_number' => '77653',
                'academic_status' => 'active',
                'program_id'=>'18',
                'year_of_admission' => '2017',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030',
                'user_id' => '1003'
            ],
            [
                'user_id' => '1004',
                'student_number' => '46340',
                'academic_status' => 'active',
                'program_id'=>'18',
                'year_of_admission' => '2017',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030',
                'user_id' => '1004'
            ],
            [
                'student_number' => '82806',
                'academic_status' => 'active',
                'program_id'=>'1',
                'year_of_admission' => '2019',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030',
                'user_id' => '1005'
            ],
            [
                'student_number' => '103789',
                'academic_status' => 'active',
                'program_id'=>'1',
                'year_of_admission' => '2020',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030',
                'user_id' => '1006'
            ],
            [
                'student_number' => '90079',
                'academic_status' => 'active',
                'program_id'=>'13',
                'year_of_admission' => '2015',
                'year_of_registration' => '2015',
                'year_of_graduation' =>'2030',
                'user_id' => '1007'
            ],
            [
                'student_number' => '123086',
                'academic_status' => 'active',
                'program_id'=>'18',
                'year_of_admission' => '2019',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030',
                'user_id' => '1008'
            ],
            [
                'student_number' => '13058',
                'academic_status' => 'active',
                'program_id'=>'18',
                'year_of_admission' => '2019',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030',
                'user_id' => '1009'
            ],
            [
                'student_number' => '45565',
                'academic_status' => 'active',
                'program_id'=>'1',
                'year_of_admission' => '2017',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030',
                'user_id' => '1010'
            ],
            [
                'student_number' => '33173',
                'academic_status' => 'active',
                'program_id'=>'17',
                'year_of_admission' => '2021',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030',
                'user_id' => '1011'
            ],
            [
                'student_number' => '77998',
                'academic_status' => 'active',
                'program_id'=>'15',
                'year_of_admission' => '2020',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030',
                'user_id' => '1012'
            ],
            [
                'student_number' => '121666',
                'academic_status' => 'active',
                'program_id'=>'1',
                'year_of_admission' => '2021',
                'year_of_registration' => '2018',
                'year_of_graduation' =>'2030',
                'user_id' => '1013'
            ],
            [
                'student_number' => '137671',
                'academic_status' => 'active',
                'program_id'=>'13',
                'year_of_admission' => '2019',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030',
                'user_id' => '1014'
            ],
            [
                'student_number' => '96221',
                'academic_status' => 'active',
                'program_id'=>'13',
                'year_of_admission' => '2013',
                'year_of_registration' => '2014',
                'year_of_graduation' =>'2030',
                'user_id' => '1015'
            ],
            [
                'student_number' => '213747',
                'academic_status' => 'active',
                'program_id'=>'1',
                'year_of_admission' => '2020',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030',
                'user_id' => '1016'
            ],
            [
                'student_number' => '22129',
                'academic_status' => 'active',
                'program_id'=>'18',
                'year_of_admission' => '2017',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030',
                'user_id' => '1017'
            ],
            [
                'student_number' => '102709',
                'academic_status' => 'active',
                'program_id'=>'18',
                'year_of_admission' => '2017',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030',
                'user_id' => '1018'
            ],
            [
                'student_number' => '62631',
                'academic_status' => 'active',
                'program_id'=>'15',
                'year_of_admission' => '2020',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030',
                'user_id' => '1019'
            ],
            [
                'student_number' => '138922',
                'academic_status' => 'active',
                'program_id'=>'17',
                'year_of_admission' => '2017',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2021',//2021 discripancy
                'user_id' => '1020'
            ],
            [
                'student_number' => '72015',
                'academic_status' => 'active',
                'program_id'=>'1',
                'year_of_admission' => '2017',
                'year_of_registration' => '2019',
                'year_of_graduation' =>'2030',
                'user_id' => '1021'
            ],
            [
                'student_number' => '153097',
                'academic_status' => 'active',
                'program_id'=>'16',
                'year_of_admission' => '2022',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030',
                'user_id' => '1022'
            ],
            [
                'student_number' => '71035',
                'academic_status' => 'active',
                'program_id'=>'16',
                'year_of_admission' => '2022',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030',
                'user_id' => '1023'
            ],
            [
                'student_number' => '152981',
                'academic_status' => 'active',
                'program_id'=>'16',
                'year_of_admission' => '2022',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030',
                'user_id' => '1024'
            ],
            [
                'student_number' => '153426',
                'academic_status' => 'active',
                'program_id'=>'16',
                'year_of_admission' => '2022',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030',
                'user_id' => '1025'
            ],
            [
                'student_number' => '165803',
                'academic_status' => 'active',
                'program_id'=>'16',
                'year_of_admission' => '2022',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030',
                'user_id' => '1026'
            ],
            [
                'student_number' => '152980',
                'academic_status' => 'active',
                'program_id'=>'16',
                'year_of_admission' => '2022',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030',
                'user_id' => '1027'
            ],
            [
                'student_number' => '65739',
                'academic_status' => 'active',
                'program_id'=>'21',
                'year_of_admission' => '2020',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030',
                'user_id' => '1028'
            ],

            [
                'student_number' => '138503',
                'academic_status' => 'active',
                'program_id'=>'21',
                'year_of_admission' => '2020',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030',
                'user_id' => '1029'
            ],
            [
                'student_number' => '90033',
                'academic_status' => 'active',
                'program_id'=>'21',
                'year_of_admission' => '2020',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030',
                'user_id' => '1030'
            ],
            [
                'user_id' => '1031',
                'student_number' => '79175',
                'academic_status' => 'active',
                'program_id'=>'21',
                'year_of_admission' => '2020',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030'
            ],
            [
                'student_number' => '67032',
                'academic_status' => 'active',
                'program_id'=>'21',
                'year_of_admission' => '2020',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030',
                'user_id' => '1032'
            ],
            [
                'student_number' => '91680',
                'academic_status' => 'active',
                'program_id'=>'21',
                'year_of_admission' => '2020',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030',
                'user_id' => '1033'
            ],
            [
                'student_number' => '62631',
                'academic_status' => 'active',
                'program_id'=>'21',
                'year_of_admission' => '2020',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030',
                'user_id' => '1034'
            ],
            [
                'student_number' => '56290',
                'academic_status' => 'active',
                'program_id'=>'21',
                'year_of_admission' => '2020',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030',
                'user_id' => '1035'
            ],
            [
                'student_number' => '66154',
                'academic_status' => 'active',
                'program_id'=>'21',
                'year_of_admission' => '2020',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030',
                'user_id' => '1036'
            ],
            [
                'user_id' => '1037',
                'student_number' => '65233',
                'academic_status' => 'active',
                'program_id'=>'21',
                'year_of_admission' => '2020',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030'
            ],
            [
                'user_id' => '1038',
                'student_number' => '89734',
                'academic_status' => 'active',
                'program_id'=>'21',
                'year_of_admission' => '2020',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030'
            ],
            [
                'user_id' => '1039',
                'student_number' => '63864',
                'academic_status' => 'active',
                'program_id'=>'21',
                'year_of_admission' => '2020',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030'
            ],
            [
                'user_id' => '1040',
                'student_number' => '148755',
                'academic_status' => 'active',
                'program_id'=>'21',
                'year_of_admission' => '2022',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030'
            ],
            [
                'user_id' => '1041',
                'student_number' => '12798',
                'academic_status' => 'active',
                'program_id'=>'21',
                'year_of_admission' => '2022',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030'
            ],
            [
                'user_id' => '1042',
                'student_number' => '101077',
                'academic_status' => 'active',
                'program_id'=>'21',
                'year_of_admission' => '2022',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030'
            ],
            [
                'user_id' => '1043',
                'student_number' => '148656',
                'academic_status' => 'active',
                'program_id'=>'21',
                'year_of_admission' => '2022',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030'
            ],
            [
                'user_id' => '1044',
                'student_number' => '148743',
                'academic_status' => 'active',
                'program_id'=>'21',
                'year_of_admission' => '2022',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030'
            ],
            [
                'user_id' => '1045',
                'student_number' => '148837',
                'academic_status' => 'active',
                'program_id'=>'21',
                'year_of_admission' => '2022',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030'
            ],
            [
                'user_id' => '1046',
                'student_number' => '148721',
                'academic_status' => 'active',
                'program_id'=>'21',
                'year_of_admission' => '2022',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030'
            ],
            [
                'user_id' => '1047',
                'student_number' => '12420',
                'academic_status' => 'active',
                'program_id'=>'21',
                'year_of_admission' => '2022',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030'
            ],
            [
                'user_id' => '1048',
                'student_number' => '87783',
                'academic_status' => 'active',
                'program_id'=>'21',
                'year_of_admission' => '2022',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030'
            ],
            [
                'user_id' => '1049',
                'student_number' => '148288',
                'academic_status' => 'active',
                'program_id'=>'21',
                'year_of_admission' => '2022',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030'
            ],
            [
                'user_id' => '1050',
                'student_number' => '147834',
                'academic_status' => 'active',
                'program_id'=>'21',
                'year_of_admission' => '2022',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030'
            ],
            [
                'user_id' => '1051',
                'student_number' => '145474',
                'academic_status' => 'active',
                'program_id'=>'21',
                'year_of_admission' => '2022',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030'
            ],
            [
                'user_id' => '2000',
                'student_number' => '12119',
                'academic_status' => 'active',
                'program_id'=>'18',
                'year_of_admission' => '2019',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030'
            ],
            [
                'user_id' => '2001',
                'student_number' => '101578',
                'academic_status' => 'active',
                'program_id'=>'18',
                'year_of_admission' => '2019',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030'
            ],
            [
                'user_id' => '2002',
                'student_number' => '87333',
                'academic_status' => 'active',
                'program_id'=>'18',
                'year_of_admission' => '2017',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030'
            ],
            [
                'user_id' => '2004',
                'student_number' => '102958',
                'academic_status' => 'active',
                'program_id'=>'18',
                'year_of_admission' => '2019',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030'
            ],
            [
                'user_id' => '2005',
                'student_number' => '73265',
                'academic_status' => 'active',
                'program_id'=>'18',
                'year_of_admission' => '2017',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030'
            ],
            [
                'user_id' => '2007',
                'student_number' => '99228',
                'academic_status' => 'active',
                'program_id'=>'18',
                'year_of_admission' => '2017',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030'
            ],
            [
                'user_id' => '2008',
                'student_number' => '101588',
                'academic_status' => 'active',
                'program_id'=>'18',
                'year_of_admission' => '2017',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030'
            ],
            [
                'user_id' => '2010',
                'student_number' => '73014',
                'academic_status' => 'active',
                'program_id'=>'18',
                'year_of_admission' => '2017',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030'
            ],
            [
                'user_id' => '2012',
                'student_number' => '102809',
                'academic_status' => 'active',
                'program_id'=>'18',
                'year_of_admission' => '2017',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030'
            ],
            [
                'user_id' => '2013',
                'student_number' => '88743',
                'academic_status' => 'active',
                'program_id'=>'18',
                'year_of_admission' => '2017',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030'
            ],
            [
                'user_id' => '2014',
                'student_number' => '85819',
                'academic_status' => 'active',
                'program_id'=>'18',
                'year_of_admission' => '2017',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030'
            ],
            [
                'user_id' => '2015',
                'student_number' => '114495',
                'academic_status' => 'active',
                'program_id'=>'18',
                'year_of_admission' => '2019',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030'
            ],
            [
                'user_id' => '2016',
                'student_number' => '59656',
                'academic_status' => 'active',
                'program_id'=>'18',
                'year_of_admission' => '2019',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030'
            ],
            [
                'user_id' => '2019',
                'student_number' => '123142',
                'academic_status' => 'active',
                'program_id'=>'18',
                'year_of_admission' => '2019',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030'
            ],
            [
                'user_id' => '2020',
                'student_number' => '123087',
                'academic_status' => 'active',
                'program_id'=>'18',
                'year_of_admission' => '2019',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030'
            ],
            [
                'user_id' => '2021',
                'student_number' => '121584',
                'academic_status' => 'active',
                'program_id'=>'18',
                'year_of_admission' => '2019',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030'
            ],
            [
                'student_number' => '57372',
                'academic_status' => 'active',
                'program_id'=>'18',
                'year_of_admission' => '2019',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030',
                'user_id' => '2022'
            ],
            [
                'student_number' => '111964',
                'academic_status' => 'active',
                'program_id'=>'18',
                'year_of_admission' => '2019',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030',
                'user_id' => '2023'

            ],
            [
                'student_number' => '121664',
                'academic_status' => 'active',
                'program_id'=>'18',
                'year_of_admission' => '2019',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030',
                'user_id' => '2024'
            ],
            [
                'student_number' => '8586',
                'academic_status' => 'active',
                'program_id'=>'18',
                'year_of_admission' => '2019',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030',
                'user_id' => '2025'
            ],
            [
                'student_number' => '56633',
                'academic_status' => 'active',
                'program_id'=>'18',
                'year_of_admission' => '2019',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030',
                'user_id' => '2026'
            ],
            [
                'student_number' => '121732',
                'academic_status' => 'active',
                'program_id'=>'18',
                'year_of_admission' => '2019',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030',
                'user_id' => '2027'
            ],
            [
                'student_number' => '73797',
                'academic_status' => 'active',
                'program_id'=>'18',
                'year_of_admission' => '2019',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030',
                'user_id' => '2028'
            ],
            [
                'student_number' => '123083',
                'academic_status' => 'active',
                'program_id'=>'18',
                'year_of_admission' => '2019',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030',
                'user_id' => '2029'

            ],
            [
                'student_number' => '121696',
                'academic_status' => 'active',
                'program_id'=>'18',
                'year_of_admission' => '2019',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030',
                'user_id' => '2030'
            ],

            [
                'student_number' => '93646',
                'academic_status' => 'active',
                'program_id'=>'13',
                'year_of_admission' => '2018',
                'year_of_registration' => '2018',
                'year_of_graduation' =>'2030',
                'user_id' => '2031'
            ],

            [
                'student_number' => '48940',
                'academic_status' => 'active',
                'program_id'=>'18',
                'year_of_admission' => '2019',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030',
                'user_id' => '2032'
            ],
            [
                'student_number' => '34370',
                'academic_status' => 'active',
                'program_id'=>'18',
                'year_of_admission' => '2019',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030',
                'user_id' => '2033'
            ],
            [
                'student_number' => '34370',
                'academic_status' => 'active',
                'program_id'=>'18',
                'year_of_admission' => '2019',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030',
                'user_id' => '2034'
            ],
            [
                'student_number' => '73200',
                'academic_status' => 'active',
                'program_id'=>'18',
                'year_of_admission' => '2019',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030',
                'user_id' => '2035'

            ],
            [
                'student_number' => '56613',
                'academic_status' => 'active',
                'program_id'=>'18',
                'year_of_admission' => '2019',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030',
                'user_id' => '2036'
            ],
            [
                'student_number' => '61634',
                'academic_status' => 'active',
                'program_id'=>'18',
                'year_of_admission' => '2019',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030',
                'user_id' => '2037'
            ],
            [
                'student_number' => '22679',
                'academic_status' => 'active',
                'program_id'=>'18',
                'year_of_admission' => '2019',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030',
                'user_id' => '2038'

            ],
            [
                'student_number' => '16257',
                'academic_status' => 'active',
                'program_id'=>'18',
                'year_of_admission' => '2019',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030',
                'user_id' => '2039'
            ],
    
            [
                'student_number' => '123085',
                'academic_status' => 'active',
                'program_id'=>'18',
                'year_of_admission' => '2019',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030',
                'user_id' => '2041'

            ],
            [
                'student_number' => '121506',
                'academic_status' => 'active',
                'program_id'=>'18',
                'year_of_admission' => '2019',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030',
                'user_id' => '2042'

            ],
            [
                'student_number' => '136818',
                'academic_status' => 'active',
                'program_id'=>'18',
                'year_of_admission' => '2021',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030',
                'user_id' => '2043'

            ],
            [
                'student_number' => '138690',
                'academic_status' => 'active',
                'program_id'=>'18',
                'year_of_admission' => '2021',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030',
                'user_id' => '2044'

            ],
            [
                'student_number' => '142255',
                'academic_status' => 'active',
                'program_id'=>'18',
                'year_of_admission' => '2021',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030',
                'user_id' => '2045'

            ],
            [
                'student_number' => '122934',
                'academic_status' => 'active',
                'program_id'=>'18',
                'year_of_admission' => '2021',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030',
                'user_id' => '2046'
            ],
            [
                'student_number' => '123081',
                'academic_status' => 'active',
                'program_id'=>'18',
                'year_of_admission' => '2021',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030',
                'user_id' => '2047'

            ],
            [
                'student_number' => '144977',
                'academic_status' => 'active',
                'program_id'=>'18',
                'year_of_admission' => '2021',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030',
                'user_id' => '2048'

            ],
            [
                'student_number' => '142259',
                'academic_status' => 'active',
                'program_id'=>'18',
                'year_of_admission' => '2021',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030',
                'user_id' => '2049'

            ],
            [
                'user_id' => '2050',
                'student_number' => '138545',
                'academic_status' => 'active',
                'program_id'=>'18',
                'year_of_admission' => '2021',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030'
            ],
            [
                'student_number' => '93811',
                'academic_status' => 'active',
                'program_id'=>'18',
                'year_of_admission' => '2021',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030',
                'user_id' => '2051'

            ],
            [
                'user_id' => '2052',
                'student_number' => '40494',
                'academic_status' => 'active',
                'program_id'=>'18',
                'year_of_admission' => '2021',
                'year_of_registration' => '2020',
                'year_of_graduation' => '2030'
                  ],
            [
                'user_id' => '2053',
                'student_number' => '73311',
                'academic_status' => 'active',
                'program_id'=>'18',
                'year_of_admission' => '2021',
                'year_of_registration' => '2020',
                'year_of_graduation' => '2030'
            ],
            [
                'user_id' => '2054',
                'student_number' => '47300',
                'academic_status' => 'active',
                'program_id'=>'18',
                  'year_of_admission' => '2021',
                'year_of_registration' => '2020',
                'year_of_graduation' => '2030'
            ],
            [
                'user_id' => '2055',
                'student_number' => '123084',
                'academic_status' => 'active',
                'program_id'=>'18',
                'year_of_admission' => '2021',
                'year_of_registration' => '2020',
                'year_of_graduation' => '2030'
            ],
            [
                'user_id' => '2056',
                'student_number' => '145367',
                'academic_status' => 'active',
                'program_id'=>'18',
                  'year_of_admission' => '2021',
                'year_of_registration' => '2020',
                'year_of_graduation' => '2030'
            ],
            [
                'user_id' => '2057',
                'student_number' => '142261',
                'academic_status' => 'active',
                'program_id'=>'18',
                  'year_of_admission' => '2021',
                'year_of_registration' => '2020',
                'year_of_graduation' => '2030'            
            ],
            [
                'user_id' => '2058',
                'student_number' => '145423',
                'academic_status' => 'active',
                'program_id'=>'18',
                  'year_of_admission' => '2021',
                'year_of_registration' => '2020',
                'year_of_graduation' => '2030'           
            ],
            [
                'user_id' => '2059',
                'student_number' => '123887',
                'academic_status' => 'active',
                'program_id'=>'18',
                  'year_of_admission' => '2021',
                'year_of_registration' => '2020',
                'year_of_graduation' => '2030'            
              ],
            [
                'student_number' => '144989',
                'academic_status' => 'active',
                'program_id'=>'18',
                'year_of_admission' => '2021',
                'year_of_registration' => '2020',
                'year_of_graduation' => '2030',       
                'user_id' => '2060'    
            ],
            [
                'user_id' => '2061',
                'student_number' => '122622',
                'academic_status' => 'active',
                'program_id'=>'18',
                  'year_of_admission' => '2021',
                'year_of_registration' => '2020',
                'year_of_graduation' => '2030'           
              ],
            [
                'user_id' => '2062',
                'student_number' => '144812',
                'academic_status' => 'active',
                'program_id'=>'18',
                  'year_of_admission' => '2021',
                'year_of_registration' => '2020',
                'year_of_graduation' => '2030'           
            ],
            [
                'user_id' => '2063',
                'student_number' => '136848',
                'academic_status' => 'active',
                'program_id'=>'18',
                  'year_of_admission' => '2021',
                'year_of_registration' => '2020',
                'year_of_graduation' => '2030'           
            ],
            [
                'user_id' => '2064',
                'student_number' => '90724',
                'academic_status' => 'active',
                'program_id'=>'18',
                  'year_of_admission' => '2021',
                'year_of_registration' => '2020',
                'year_of_graduation' => '2030'           
            ],
            [
                'user_id' => '2065',
                'student_number' => '138601',
                'academic_status' => 'active',
                'program_id'=>'18',
                  'year_of_admission' => '2021',
                'year_of_registration' => '2020',
                'year_of_graduation' => '2030'            
            ],
            [
                'user_id' => '2066',
                'student_number' => '145422',
                'academic_status' => 'active',
                'program_id'=>'18',
                  'year_of_admission' => '2021',
                'year_of_registration' => '2020',
                'year_of_graduation' => '2030'           
            ],
            [
                'user_id' => '2067',
                'student_number' => '89341',
                'academic_status' => 'active',
                'program_id'=>'18',
                  'year_of_admission' => '2021',
                'year_of_registration' => '2020',
                'year_of_graduation' => '2030'            
            ],
            [
                'user_id' => '2068',
                'student_number' => '73581',
                'academic_status' => 'active',
                'program_id'=>'18',
                  'year_of_admission' => '2021',
                'year_of_registration' => '2020',
                'year_of_graduation' => '2030'            
            ],
            [
                'user_id' => '2069',
                'student_number' => '26145',
                'academic_status' => 'active',
                'program_id'=>'18',
                  'year_of_admission' => '2021',
                'year_of_registration' => '2020',
                'year_of_graduation' => '2030'            
            ],
            [
                'user_id' => '2070',
                'student_number' => '122629',
                'academic_status' => 'active',
                'program_id'=>'18',
                  'year_of_admission' => '2021',
                'year_of_registration' => '2020',
                'year_of_graduation' => '2030'            
            ],
            [
                'user_id' => '2071',
                'student_number' => '136815',
                'academic_status' => 'active',
                'program_id'=>'18',
                  'year_of_admission' => '2021',
                'year_of_registration' => '2020',
                'year_of_graduation' => '2030'            
            ],
            [
                'user_id' => '2072',
                'student_number' => '10991',
                'academic_status' => 'active',
                'program_id'=>'18',
                  'year_of_admission' => '2021',
                'year_of_registration' => '2020',
                'year_of_graduation' => '2030'           
            ],
            [
                'user_id' => '1052',
                'student_number' => '6680',
                'academic_status' => 'active',
                'program_id'=>'1',
                'year_of_admission' => '2018',
                'year_of_registration' => '2020',
                'year_of_graduation' => '2030'            
            ],
            [
                'user_id' => '1053',
                'student_number' => '9367',
                'academic_status' => 'active',
                'program_id'=>'7',
                'year_of_admission' => '2016',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030'
            ],
            [
                'user_id' => '1054',
                'student_number' => '35885',
                'academic_status' => 'active',
                'program_id'=>'1',
                'year_of_admission' => '2013',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030'
            ],
            [
                'user_id' => '1055',
                'student_number' => '36818',
                'academic_status' => 'active',
                'program_id'=>'1',
                'year_of_admission' => '2018',
                'year_of_registration' => '2018',
                'year_of_graduation' =>'2030'
            ],

            [
                'student_number' => '52584',
                'academic_status' => 'active',
                'program_id'=>'15',
                'year_of_admission' => '2016',
                'year_of_registration' => '2018',
                'year_of_graduation' =>'2030',
                'user_id' => '1057'
            ],
            [
                'student_number' => '47987',
                'academic_status' => 'active',
                'program_id'=>'15',
                'year_of_admission' => '2015',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030',
                'user_id' => '1058'
            ],
            [
                'student_number' => '73656',
                'academic_status' => 'active',
                'program_id'=>'1',
                'year_of_admission' => '2013',
                'year_of_registration' => '2015',
                'year_of_graduation' =>'2030',
                'user_id' => '1059'
            ],
            [
                'student_number' => '78146',
                'academic_status' => 'active',
                'program_id'=>'1',
                'year_of_admission' => '2013',
                'year_of_registration' => '2021',
                'year_of_graduation' =>'2030',
                'user_id' => '1060'
            ],
            [
                'student_number' => '87816',
                'academic_status' => 'active',
                'program_id'=>'1',
                'year_of_admission' => '2014',
                'year_of_registration' => '2015',
                'year_of_graduation' =>'2030',
                'user_id' => '1061'
            ],
            [
                'student_number' => '88531',
                'academic_status' => 'active',
                'program_id'=>'1',
                'year_of_admission' => '2015',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030',
                'user_id' => '1062'
            ],
            [
                'student_number' => '89821',
                'academic_status' => 'active',
                'program_id'=>'5',
                'year_of_admission' => '2015',
                'year_of_registration' => '2016',
                'year_of_graduation' =>'2030',
                'user_id' => '1063'

            ],
            [
                'student_number' => '94106',
                'academic_status' => 'active',
                'program_id'=>'15',
                'year_of_admission' => '2016',
                'year_of_registration' => '2018',
                'year_of_graduation' =>'2030',
                'user_id' => '1064'

            ],
            [
                'student_number' => '95966',
                'academic_status' => 'active',
                'program_id'=>'15',
                'year_of_admission' => '2016',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030',
                'user_id' => '1065'

            ],
            [
                'student_number' => '114096',
                'academic_status' => 'active',
                'program_id'=>'1',
                'year_of_admission' => '2018',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030',
                'user_id' => '1066'
            ],
            [
                'student_number' => '55052',
                'academic_status' => 'active',
                'program_id'=>'7',
                'year_of_admission' => '2020',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030',
                'user_id' => '1067'

            ],
            [
                'student_number' => '137129',
                'academic_status' => 'active',
                'program_id'=>'1',
                'year_of_admission' => '2020',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030',
                'user_id' => '1068'

            ],
            [
                'student_number' => '137130',
                'academic_status' => 'active',
                'program_id'=>'1',
                'year_of_admission' => '2020',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030',
                'user_id' => '1069'

            ],
            [
                'student_number' => '137131',
                'academic_status' => 'active',
                'program_id'=>'1',
                'year_of_admission' => '2020',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030',
                'user_id' => '1070'

            ],
            [
                'student_number' => '87184',
                'academic_status' => 'active',
                'program_id'=>'5',
                'year_of_admission' => '2020',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030',
                'user_id' => '1071'

            ],
            [
                'student_number' => '137647',
                'academic_status' => 'active',
                'program_id'=>'7',
                'year_of_admission' => '2020',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030',
                'user_id' => '1072'

            ],
            [
                'student_number' => '213843',
                'academic_status' => 'active',
                'program_id'=>'1',
                'year_of_admission' => '2020',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030',
                'user_id' => '1073'
            ],
            [
                'student_number' => '92733',
                'academic_status' => 'active',
                'program_id'=>'15',
                'year_of_admission' => '2021',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030',  
                'user_id' => '1074'

            ],
            [
                'student_number' => '137618',
                'academic_status' => 'active',
                'program_id'=>'7',
                'year_of_admission' => '2021',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030',
                'user_id' => '1075'

            ],
            [
                'student_number' => '46429',
                'academic_status' => 'active',
                'program_id'=>'5',
                'year_of_admission' => '2021',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030',
                'user_id' => '1076'

            ],
            [
                'student_number' => '24509',
                'academic_status' => 'active',
                'program_id'=>'5',
                'year_of_admission' => '2021',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030',
                'user_id' => '1077'

            ],
            [
                'student_number' => '149544',
                'academic_status' => 'active',
                'program_id'=>'7',
                'year_of_admission' => '2022',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030',
                'user_id' => '1078'

            ],
            [
                'student_number' => '149501',
                'academic_status' => 'active',
                'program_id'=>'7',
                'year_of_admission' => '2022',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030',
                'user_id' => '1079'

            ],
            [
                'student_number' => '151795',
                'academic_status' => 'active',
                'program_id'=>'7',
                'year_of_admission' => '2022',
                'year_of_registration' => '2020',
                'year_of_graduation' =>'2030',
                'user_id' => '1080'
            ],
            [
                'student_number' => '68314',
                'academic_status' => 'active',
                'program_id'=>'15',
                'year_of_admission' => '2022',//not indicated
                'year_of_registration' => '2020',//not indicated
                'year_of_graduation' =>'2030',
                'user_id' => '1081'

            ],
            [
                'student_number' => '152152',
                'academic_status' => 'active',
                'program_id'=>'7',
                'year_of_admission' => '2022',//not indicated
                'year_of_registration' => '2020',//not indicated
                'year_of_graduation' =>'2030',
                'user_id' => '1082'

            ],
            [
                'student_number' => '166878',
                'academic_status' => 'active',
                'program_id'=>'7',
                'year_of_admission' => '2022',//not indicated
                'year_of_registration' => '2020',//not indicated
                'year_of_graduation' =>'2030',
                'user_id' => '1083'
            ],
            [
                'student_number' => '11111',//not indicated
                'academic_status' => 'active',
                'program_id'=>'7',
                'year_of_admission' => '2022',//not indicated
                'year_of_registration' => '2020',//not indicated
                'year_of_graduation' =>'2030',
                'user_id' => '1084'
            ],
        ]);
    }
}
