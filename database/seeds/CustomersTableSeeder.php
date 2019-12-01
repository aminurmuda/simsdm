<?php

use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('customers')->delete();
        
        \DB::table('customers')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Annisa Septiana',
                'company_name' => 'PT. XYZ Indonesia Jaya',
                'company_address' => 'Jl. Salemba No. 1',
                'phone' => '+628989777555',
                'created_at' => '2019-11-16 16:12:24',
                'updated_at' => '2019-11-16 16:12:24',
            ),
        ));
        
        
    }
}