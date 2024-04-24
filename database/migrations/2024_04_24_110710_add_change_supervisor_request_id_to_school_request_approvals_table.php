<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddChangeSupervisorRequestIdToSchoolRequestApprovalsTable extends Migration
{
    public function up()
    {
        Schema::table('school_request_approvals', function (Blueprint $table) {
            $table->unsignedBigInteger('change_supervisor_request_id')->nullable();
            $table->foreign('change_supervisor_request_id')
                  ->references('id')
                  ->on('change_supervisor_requests')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('school_request_approvals', function (Blueprint $table) {
            $table->dropForeign(['change_supervisor_request_id']);
            $table->dropColumn('change_supervisor_request_id');
        });
    }
}