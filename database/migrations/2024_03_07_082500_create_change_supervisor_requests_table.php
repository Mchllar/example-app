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
            $table->foreignId('student_id')->constrained('users');
            $table->string('title_of_thesis');
            $table->foreignId('current_supervisor_1_id')->nullable()->constrained('users');
            $table->foreignId('current_supervisor_2_id')->nullable()->constrained('users');
            $table->foreignId('current_supervisor_3_id')->nullable()->constrained('users');
            $table->foreignId('proposed_supervisor_1_id')->nullable()->constrained('users');
            $table->foreignId('proposed_supervisor_2_id')->nullable()->constrained('users');
            $table->foreignId('proposed_supervisor_3_id')->nullable()->constrained('users');
            $table->date('effective_date');
            $table->text('reason_for_change');
            $table->boolean('approved_by_school_graduate_studies')->default(false);
            $table->boolean('approved_by_board_of_graduate_studies')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('change_supervisor_requests');
    }
}