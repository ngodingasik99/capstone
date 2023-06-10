<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transactions')->insert([
            'id' => '0',
            'user_id' => 2,
            'total' => '300000',
            'transaction_code' => 'rand-1234',
            'created_at' => now(),
            'updated_at' => now(),            
        ]);
    }
}
