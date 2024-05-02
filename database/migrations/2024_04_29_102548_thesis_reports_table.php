<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up()
    {
        Schema::create('theses_reports', function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('submission_id');
            $table->foreign('submission_id')->references('id')->on('theses');
            $table->string('report');
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('theses_reports');
    }
};
