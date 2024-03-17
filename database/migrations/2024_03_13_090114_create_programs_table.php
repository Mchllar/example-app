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
            [`Master of Business Administration [MBA]`]
            [`Master of Science in Development Finance`]
            [`Master of Science in Entrepreneurship`]
            [`Master of Science in Finance`]
            [`Master of Science in Information Technology`]
            [`Master of Science in Mobile Telecommunication and Innovation`]
            [`Master of Science in Statistics`]
            [`Master of Science in Telecommunication Management and Innovation`]
            [`Master of Science in Data Science`]
            [`Master of Science in Mathematical Finance`]
            [`Master of Commerce [M.Com]`]
            [`Master of Public Policy and Management`]
            [`Master of Science in Health Informatics`]
            [`Master of Science in Public Health`]
            [`Master of Science in Strathmore Institute of Mathematical Sciences`]
            [`Master of Science in Applied Philosophy and Ethics`]
            // ... and so on, continue with all your data
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