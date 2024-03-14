<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('profile')->nullable();
            $table->unsignedBigInteger('role_id');
            $table->foreign('role_id')->references('id')->on('roles');
            $table->string('phone_number')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->foreign('country_id')->references('id')->on('country');
            $table->unsignedBigInteger('religion_id')->nullable();
            $table->foreign('religion_id')->references('id')->on('religion');
            $table->unsignedBigInteger('gender_id')->nullable();
            $table->foreign('gender_id')->references('id')->on('gender');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->string('otp_code')->nullable();
            $table->timestamp('otp_created_at')->nullable();
            $table->string('reset_token')->nullable();
            $table->timestamp('reset_token_expiry')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
