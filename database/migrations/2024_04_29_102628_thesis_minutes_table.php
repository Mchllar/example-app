<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up()
    {
        Schema::create('theses_minutes', function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('submission_id');
            $table->foreign('submission_id')->references('id')->on('theses');
            $table->string('minutes');
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('theses_minutes');
    }
};
