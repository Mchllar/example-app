<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChangeSupervisorRequestsTable extends Migration
{
    public function up()
    {
        Schema::create('change_supervisor_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->string('thesis_title');
            $table->string('proposed_supervisor_1')->nullable();
            $table->string('proposed_supervisor_2')->nullable();
            $table->string('proposed_supervisor_3')->nullable();
            $table->date('effective_date');
            $table->text('reason_for_change');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('change_supervisor_requests');
    }
}
