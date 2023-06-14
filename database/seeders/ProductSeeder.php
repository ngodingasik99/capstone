<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'product_name' => 'Ayam Geprek Paket Lengkap',
            'price' => 15000,
            'stock' => 20,
            'category_id' => 1,
            'photo' => Str::random(20),
            'created_at' => now(),
            'updated_at' => now(),            
        ]);

        DB::table('products')->insert([
            'product_name' => 'Ayam Geprek (Paha Bawah)',
            'price' => 9000,
            'stock' => 20,
            'category_id' => 2,
            'photo' => Str::random(20),
            'created_at' => now(),
            'updated_at' => now(),            
        ]);
    }
}
