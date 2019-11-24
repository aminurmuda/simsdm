<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteColumnDurationAddColumnStartDateEndDateToPaidLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('paid_leaves', function (Blueprint $table) {
            $table->dropColumn(['duration']);
            $table->date('start_date');
            $table->date('end_date');
            $table->string('reason');
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
        Schema::table('paid_leaves', function (Blueprint $table) {
            $table->integer('duration');
            $table->dropColumn(['start_date', 'end_date', 'reason', 'created_at', 'updated_at']);

        });
    }
}
