<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AcademicLeaveRequestsSeeder extends Seeder
{
    public function run()
    {
        $data = [];

        for ($i = 1; $i <= 20; $i++) {
            $data[] = [
                'student_id' => $i,
                'address' => '123 Street, City ' . $i,
                'leave_start_date' => Carbon::now()->subDays(rand(1, 30))->toDateString(),
                'reason_for_leave' => 'Personal reason ' . $i,
                'return_date' => Carbon::now()->addDays(rand(30, 90))->toDateString(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        DB::table('academic_leave_requests')->insert($data);
    }
}
