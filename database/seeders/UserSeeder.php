<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'email_verified_at' => now(),
            'password' => Hash::make('admin123'), // password
            'photo' => Str::random(10),
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'name' => 'kasir',
            'username' => 'kasir',
            'email' => 'kasir@gmail.com',
            'role' => 'kasir',
            'email_verified_at' => now(),
            'password' => Hash::make('kasir123'), // password
            'photo' => Str::random(10),
            'remember_token' => Str::random(10),
        ]);
    }
}
