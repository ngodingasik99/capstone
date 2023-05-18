<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'category_name' => 'Paketan',
            'description' => 'Pesanan dalam bentuk paketan',
            'photo' => Str::random(20),
            'created_at' => now(),
            'updated_at' => now(),            
        ]);

        DB::table('categories')->insert([
            'category_name' => 'Satuan',
            'description' => 'Pesanan dalam bentuk satuan',
            'photo' => Str::random(20),
            'created_at' => now(),
            'updated_at' => now(),            
        ]);
    }
}
