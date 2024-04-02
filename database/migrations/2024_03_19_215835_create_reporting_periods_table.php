<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reporting_periods', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('year', 4);
            $table->string('status', 25)->default('Active');
            $table->timestamps();
        });
        
        // Inserting data into the table
        DB::table('reporting_periods')->insert([
            ['name' => 'Jan-June 2021', 'year' => '2021', 'status' => 'Active'],
            ['name' => 'July-Dec 2021', 'year' => '2021', 'status' => 'Active'],
            ['name' => 'Jan-June 2022', 'year' => '2022', 'status' => 'Active'],
            ['name' => 'July-Dec 2022', 'year' => '2022', 'status' => 'Active'],
            ['name' => 'Jan-June 2023', 'year' => '2023', 'status' => 'Active'],
            ['name' => 'July-Dec 2023', 'year' => '2023', 'status' => 'Active'],
            ['name' => 'Jan-June 2024', 'year' => '2024', 'status' => 'Active'],
            ['name' => 'July-Dec 2024', 'year' => '2024', 'status' => 'Active'],
            ['name' => 'Jan-June 2020', 'year' => '2020', 'status' => 'Active'],
            ['name' => 'Jan-June 2018', 'year' => '2019', 'status' => 'Inactive']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reporting_periods');
    }
};
