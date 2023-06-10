<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ManagefinancesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('managefinances')->insert([
            'id' => '1',
            'modal' => '300000',
            'created_at' => now(),
            'updated_at' => now(),            
        ]);
    }
}
