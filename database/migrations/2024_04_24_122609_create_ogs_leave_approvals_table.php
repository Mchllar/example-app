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
        Schema::create('ogs_leave_approvals', function (Blueprint $table) {
            $table->id();
            $table->date('ogs_approval_date')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('academic_leave_request_id')->nullable();
            $table->foreign('academic_leave_request_id')
                  ->references('id')
                  ->on('academic_leave_requests')
                  ->onDelete('cascade');
            $table->enum('status', ['Approved', 'Declined','Pending'])->default('Pending');
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
        Schema::dropIfExists('ogs_leave_approvals');
    }
};
