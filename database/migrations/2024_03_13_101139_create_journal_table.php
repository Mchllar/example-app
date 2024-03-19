<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJournalTable extends Migration
{
    public function up()
    {
        Schema::create('journals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('journal_title');
            $table->string('title_of_paper');
            $table->string('status');
            $table->string('file_upload'); // Storing the file path
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('journals');
    }
}
