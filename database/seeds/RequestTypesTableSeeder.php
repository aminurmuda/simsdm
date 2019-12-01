<?php

use Illuminate\Database\Seeder;

class RequestTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('request_types')->delete();
        
        \DB::table('request_types')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Regular',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Khusus',
            ),
        ));
        
        
    }
}