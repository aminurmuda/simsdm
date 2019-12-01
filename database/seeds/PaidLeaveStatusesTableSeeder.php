<?php

use Illuminate\Database\Seeder;

class PaidLeaveStatusesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('paid_leave_statuses')->delete();
        
        \DB::table('paid_leave_statuses')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Menunggu Persetujuan',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Diterima',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Ditolak',
            ),
        ));
        
        
    }
}