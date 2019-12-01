<?php

use Illuminate\Database\Seeder;

class EmployeeStatusesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('employee_statuses')->delete();
        
        \DB::table('employee_statuses')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Busy',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'On Bench',
            ),
        ));
        
        
    }
}