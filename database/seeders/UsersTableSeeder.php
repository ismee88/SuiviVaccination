<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Admin
        DB::table('admins')->insert([
            'nom_complet'=>'Mr. Admin',
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('admin'),
        ]);
    }
}
