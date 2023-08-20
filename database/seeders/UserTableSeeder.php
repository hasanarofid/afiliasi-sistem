<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('users')->insert([
            [
                'id'=>1,
                'name'=>'admin',
                'email'=>'admin@gmail.com',
                'password'=>Hash::make('admin123'),
                'role'=>'Admin'
            ],
            [
                'id'=>2,
                'name'=>'member',
                'email'=>'member@gmail.com',
                'password'=>Hash::make('member'),
                'role'=>'Member'
            ],
            
        ]);
    }
}
