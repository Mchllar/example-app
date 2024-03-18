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
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('school_id');
            $table->foreign('school_id')->references('id')->on('schools');
            $table->timestamps();
        });
        
        $programsData = [
            ['name' =>'Master of Business Administration [MBA]', 'school_id' => 0],
            ['name' =>'Master of Commerce [M.Com]', 'school_id' => 4],
            ['name' =>'Master of Science in Entrepreneurship', 'school_id' => 0],
            ['name' =>'Master of Science in Finance', 'school_id' => 1],
            ['name' =>'Master of Science in Public Health', 'school_id' => 2],
            ['name' =>'Master of Science in Telecommunication Management and Innovation', 'school_id' => 6],
            ['name' =>'Master of Science in Statistics', 'school_id' => 5],
            ['name' =>'Master of Science in Development Finance', 'school_id' => 1],
            ['name' =>'Master of Public Policy and Management', 'school_id' => 3],
            ['name' =>'Master of Science in Health Informatics', 'school_id' => 2],
            ['name' =>'Master of Science in Mobile Telecommunication and Innovation', 'school_id' => 6],
            ['name' =>'Master of Science in Applied Philosophy and Ethics', 'school_id' => 2],
            ['name' =>'Master of Science in Strathmore Institute of Mathematical Sciences', 'school_id' => 5],
            ['name' =>'Master of Science in Mathematical Finance', 'school_id' => 5],
            ['name' =>'Master of Science in Data Science', 'school_id' => 6],
        ];

        DB::table('programs')->insert($programsData);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programs');
    }
};