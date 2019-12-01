<?php

use Illuminate\Database\Seeder;

class AttendanceReportStatusesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('attendance_report_statuses')->delete();
        
        \DB::table('attendance_report_statuses')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Menunggu Approval',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Disetujui',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Ditolak',
            ),
        ));
        
        
    }
}