<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'email' => 'admin@gmail.com',
                'password' => '$2y$10$WVNGt/aQ.w/mzERFfXZcBufJ.64yBt4/dRDW8LvYv4EPqqvSTohpq',
                'name' => 'admin',
                'birth_date' => NULL,
                'birth_place' => NULL,
                'gender' => NULL,
                'address' => NULL,
                'department_id' => NULL,
                'role_id' => 1,
                'status_id' => NULL,
                'email_verified_at' => NULL,
                'remember_token' => NULL,
                'created_at' => '2019-12-01 11:18:08',
                'updated_at' => '2019-12-01 11:18:08',
            ),
        ));
        
        
    }
}