<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThesisSubmissionsTable extends Migration
{
    
    public function up()
    {
        Schema::create('thesis_submissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('users');
            $table->string('thesis_document'); // File path or URL to the thesis document
            $table->date('Upload_date');
            $table->string('submission_type'); // Submission type: pre_defense or post_defense
            $table->foreignId('current_supervisor_1_id')->constrained('users');
            $table->foreignId('current_supervisor_2_id')->constrained('users');
            $table->foreignId('current_supervisor_3_id')->nullable()->constrained('users');
            $table->boolean('supervisor_verdict')->default(false); 
            $table->date('Reminder');

            $table->string('correction_form')->nullable(); // File path or URL to the correction form (for post-defense)
            $table->string('correction_summary')->nullable(); // File path or URL to the correction summary (for post-defense)

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('thesis_submissions');
    }
};
