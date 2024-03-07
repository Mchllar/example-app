<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgressReportsTable extends Migration
{
    public function up()
    {
        Schema::create('progress_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('reporting_period');
            $table->text('goals_set')->nullable();
            $table->text('progress_report')->nullable();
            $table->text('problems_issues')->nullable();
            $table->text('agreed_goals')->nullable();
            $table->string('progress_rating')->nullable();
            $table->text('seminars_presentations')->nullable();
            $table->text('supervisor_comments')->nullable();
            $table->text('director_comments')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('progress_reports');
    }
}
