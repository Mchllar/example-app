<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntentionTable extends Migration
{
    public function up()
    {
        Schema::create('notices', function (Blueprint $table) {
            $table->id();
            $table->string('thesis_title');
            $table->date('proposed_date');
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('id')->on('students');

            //$table->boolean('approved_by_director_graduate_studies')->default(false);
            //$table->boolean('approved_by_principal_supervisor')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('notices');
    }
};
