<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Import DB facade

class DataMasterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('data_master')->insert([
            'number_phone'=>'081234567891',
            'customer_name'=>'narra',
            'address'=>'sei,panas',
            'gender'=>'famale',
            'total_point'=>'0'
        ]);
    }
}
