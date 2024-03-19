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
            $table->unsignedBigInteger('staff_id');
            $table->foreign('staff_id')->references('id')->on('staff');
            $table->date('reporting_period');
            $table->text('goals_set');
            $table->text('progress_report');
            $table->text('problems_issues');
            $table->text('agreed_goals');
            $table->integer('progress_rating');
            $table->integer('completion_rate')->nullable();
            $table->integer('thesis_completion_percentage')->nullable();
            $table->text('completion_estimation')->nullable();
            $table->text('problems_addressed');
            $table->text('concerns_about_student');
            $table->text('inadequate_aspects_comment');
            $table->boolean('progress_satisfactory');
            $table->text('registration_recommendation')->nullable();
            $table->text('unsatisfactory_progress_comments')->nullable();
            $table->date('student_date');
            $table->date('principal_date');
            $table->date('lead_date');
            $table->string('director_name');
            $table->date('director_date');
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
