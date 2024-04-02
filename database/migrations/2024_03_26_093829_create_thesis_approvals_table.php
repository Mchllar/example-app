<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('thesis_approvals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('submission_id');
            $table->foreign('submission_id')->references('id')->on('theses');
            $table->unsignedBigInteger('supervisor_id');
            $table->foreign('supervisor_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('thesis_approvals');
    }
};
