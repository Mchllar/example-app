<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThesisSubmissionsTable extends Migration
{
    
    public function up()
    {
       // Schema::create('theses', function (Blueprint $table) {
        //    $table->id();
        //    $table->unsignedBigInteger('user_id');
         //   $table->foreign('user_id')->references('id')->on('users');
            //$table->string('thesis'); 
            //$table->string('submission_type'); 
            //$table->foreignId('current_supervisor_1_id')->constrained('users');
            //$table->foreignId('current_supervisor_2_id')->constrained('users');
            //$table->foreignId('current_supervisor_3_id')->nullable()->constrained('users');
            //$table->boolean('supervisor_verdict')->default(false); 
            //$table->date('Reminder');

            //$table->string('correction_form')->nullable(); 
            //$table->string('correction_summary')->nullable();
            //$table->timestamps();

            Schema::create('theses', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id');
                $table->foreign('user_id')->references('id')->on('users');
                $table->string('submission_type');
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



