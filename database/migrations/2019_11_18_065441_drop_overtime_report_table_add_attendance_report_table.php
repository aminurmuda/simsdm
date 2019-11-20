<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropOvertimeReportTableAddAttendanceReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('overtime_reports');
        Schema::dropIfExists('overtime_report_status');

        Schema::create('attendance_report_statuses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
        });

        Schema::create('attendance_reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('project_id');
            $table->date('date');
            $table->timestamp('clock_in')->nullable();
            $table->timestamp('clock_out')->nullable();
            $table->string('clock_in_note')->nullable();
            $table->string('clock_out_note')->nullable();
            $table->unsignedBigInteger('status_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('project_id')->references('id')->on('projects');
            $table->foreign('status_id')->references('id')->on('attendance_report_statuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendance_reports');
        Schema::dropIfExists('attendance_report_statuses');

        Schema::create('overtime_report_status', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
        });
        
        Schema::create('overtime_reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('status_id');
            $table->integer('duration');

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('status_id')->references('id')->on('overtime_report_status');
        });
    }
}
