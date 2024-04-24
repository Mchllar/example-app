<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAcademicLeaveRequestIdToLeaveApprovalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('leave_approvals', function (Blueprint $table) {
            $table->unsignedBigInteger('academic_leave_request_id')->nullable();
            $table->foreign('academic_leave_request_id')
                  ->references('id')
                  ->on('academic_leave_requests')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('leave_approvals', function (Blueprint $table) {
            $table->dropForeign(['academic_leave_request_id']);
            $table->dropColumn('academic_leave_request_id');
        });
    }
}
