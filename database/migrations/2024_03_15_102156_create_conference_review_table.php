<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('conference_reviews', function (Blueprint $table) {
            $table->id();
            $table->string('file_upload');
            $table->string('comments');
            $table->unsignedBigInteger('student_number');
            $table->foreign('student_number')->references('id')->on('users');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('conference_reviews');
    }
};
