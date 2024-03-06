<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // Migration for users table
public function up(): void
{
    Schema::create('users', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('email')->unique();
        $table->string('password');
        $table->string('profile')->nullable(); // Add profile field
        $table->string('role'); // Add role field
        // Add fields for each role
        $table->string('student_number')->nullable(); // For Student role
        $table->string('phone_number')->nullable(); // For Student role
        $table->date('date_of_birth')->nullable(); // For Student role
        $table->string('gender')->nullable(); // For Student role
        $table->string('nationality')->nullable(); // For Student role
        $table->string('religion')->nullable(); // For Student role
        $table->string('school')->nullable(); // For Student role
        $table->string('programme')->nullable(); // For Student role
        $table->string('intake')->nullable(); // For Student role
        $table->string('previous_school')->nullable(); // For Student role
        $table->string('status')->nullable(); // For Student role
        $table->string('curriculum_vitae')->nullable(); // For Supervisor role
        $table->string('contract')->nullable(); // For Supervisor role
        $table->string('otp_code')->nullable();
        $table->timestamp('otp_created_at')->nullable();
        $table->string('reset_token')->nullable();
        $table->timestamp('reset_token_expiry')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};