<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyLeaveApprovalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Drop the existing staff_id column
        Schema::table('leave_approvals', function (Blueprint $table) {
            $table->dropForeign(['staff_id']);
            $table->dropColumn('staff_id');
        });
        
        // Add the user_id column
        Schema::table('leave_approvals', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable()->after('id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Drop the user_id column
        Schema::table('leave_approvals', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });

        // Recreate the staff_id column
        Schema::table('leave_approvals', function (Blueprint $table) {
            $table->unsignedBigInteger('staff_id')->nullable()->after('id');
            $table->foreign('staff_id')->references('id')->on('staff')->onDelete('cascade');
        });
    }
}
