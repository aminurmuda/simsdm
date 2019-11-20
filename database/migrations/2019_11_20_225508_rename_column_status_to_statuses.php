<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameColumnStatusToStatuses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('employee_status', 'employee_statuses');
        Schema::rename('paid_leave_status', 'paid_leave_statuses');
        Schema::rename('request_status', 'request_statuses');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::rename('employee_statuses', 'employee_status');
        Schema::rename('paid_leave_statuses', 'paid_leave_status');
        Schema::rename('request_statuses', 'request_status');   
    }
}
