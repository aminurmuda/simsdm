<?php

use Illuminate\Database\Seeder;

class ProjectStatusesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('project_statuses')->delete();
        
        \DB::table('project_statuses')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Baru Dibuat',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'On Going',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Selesai',
            ),
        ));
        
        
    }
}