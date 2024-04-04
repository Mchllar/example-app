<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThesisSubmissionsTable extends Migration
{
    
    public function up()
    {
            Schema::create('theses', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id');
                $table->foreign('user_id')->references('id')->on('users');
                $table->tinyInteger('submission_type')->default(0)->comment('0: Unknown, 1: Pre Defense, 2: Post Defense');
                $table->string('thesis_document');
                $table->string('correction_form')->nullable();
                $table->string('correction_summary')->nullable();
                $table->timestamps();
                
            });
    }

    public function down()
   {
       Schema::dropIfExists('thesis_submissions');
    }
};



