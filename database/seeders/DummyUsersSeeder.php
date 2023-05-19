<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userData = [
            [
                'name'=>'pak admin',
                'email'=>'admin@gmail.com',
                'role'=>'admin',
                'password'=>bcrypt('admin123')
            ],

            [
                'name'=>'mas kasir',
                'email'=>'kasir@gmail.com',
                'role'=>'kasir',
                'password'=>bcrypt('kasir123')
            ],
        ];

        foreach($userData as $key => $val){
            User::create($val);
        }
    }
}
