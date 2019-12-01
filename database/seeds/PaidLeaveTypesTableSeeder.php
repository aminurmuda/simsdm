<?php

use Illuminate\Database\Seeder;

class PaidLeaveTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('paid_leave_types')->delete();
        
        \DB::table('paid_leave_types')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Cuti Tahunan',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Cuti Sakit',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Cuti Religi',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Cuti Hamil',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Cuti Khusus',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Cuti Nikah',
            ),
        ));
        
        
    }
}