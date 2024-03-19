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
    public function up()
    {
        // In the up() method of the migration file
Schema::create('academic_leave_requests', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('student_id')->nullable();
    $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
    $table->unsignedBigInteger('staff_id')->nullable();
    $table->foreign('staff_id')->references('id')->on('staff')->onDelete('cascade');
    $table->unsignedBigInteger('user_id');
    $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    $table->string('address');
    $table->date('leave_date');
    $table->string('leave_month');
    $table->string('leave_year');
    $table->text('reason_for_leave');
    $table->date('return_date');
    $table->date('ogs_date')->nullable();
    $table->timestamps();
});
;
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('academic_leave_requests');
    }
};
