<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddScheduledAtToCorrectionRemindersTable extends Migration

{
    public function up()
    {
        Schema::table('correction_reminders', function (Blueprint $table) {
            $table->timestamp('scheduled_at')->nullable()->after('created_at');
        });
    }

    public function down()
    {
        Schema::table('correction_reminders', function (Blueprint $table) {
            $table->dropColumn('scheduled_at');
        });
    }
};
