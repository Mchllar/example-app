<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->integer('student_number');
            $table->enum('academic_status', ['Active', 'Academic Leave', 'Suspended']);
            $table->unsignedBigInteger('program_id');
            $table->foreign('program_id')->references('id')->on('programs');
            $table->integer('year_of_admission');
            $table->integer('year_of_registration');
            $table->integer('year_of_graduation');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
        
        
    }

    public function down()
    {
      Schema::dropIfExists('students');
    }
};