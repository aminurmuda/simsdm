<?php

use Illuminate\Database\Seeder;

class RoleListsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('role_lists')->delete();
        
        \DB::table('role_lists')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 1,
                'role_id' => 1,
                'created_at' => '2019-12-01 11:18:08',
                'updated_at' => '2019-12-01 11:18:08',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 1,
                'role_id' => 2,
                'created_at' => '2019-12-01 11:18:08',
                'updated_at' => '2019-12-01 11:18:08',
            ),
        ));
        
        
    }
}