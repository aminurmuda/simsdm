<?php

use Illuminate\Database\Seeder;

class RequestStatusesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('request_statuses')->delete();
        
        \DB::table('request_statuses')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Menuggu Persetujuan Manajer Departemen',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Menunggu Persetujuan Karyawan',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Ditolak Manajer',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Diterima Karyawan',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Ditolak Karyawan',
            ),
        ));
        
        
    }
}