<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TransactionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('transaction')->insert([
            'date'=>now(),
            'number_phone'=>'081234567891',
            'customer_name'=>'narra',
            'total_point'=>'0',
        ]);
    }
}
