<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgressReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('progress_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('id')->on('students');
            $table->unsignedBigInteger('principal_supervisor_id');
            $table->foreign('principal_supervisor_id')->references('id')->on('users')->where('role_id', '=', 2);
            $table->unsignedBigInteger('lead_supervisor_id');
            $table->foreign('lead_supervisor_id')->references('id')->on('users')->where('role_id', '=', 2);
            $table->unsignedBigInteger('reporting_periods_id')->default(1);
            $table->foreign('reporting_periods_id')->references('id')->on('reporting_periods');
            $table->string('mode_of_study')->nullable();
            $table->text('goals_set');
            $table->text('progress_report');
            $table->text('problems_issues');
            $table->text('agreed_goals');
            $table->integer('students_progress_rating');
            $table->integer('students_completion_rate')->nullable();
            $table->integer('thesis_completion_percentage')->nullable();
            $table->text('completion_estimation')->nullable();
            $table->text('problems_addressed');
            $table->text('concerns_about_student');
            $table->text('inadequate_aspects_comment');
            $table->boolean('dir_progress_satisfaction');
            $table->text('dir_registration_recommendation')->nullable();
            $table->text('dir_unsatisfactory_progress_comments')->nullable();
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
        Schema::dropIfExists('progress_reports');
    }
}
