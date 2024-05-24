<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Developer',
                'email' => 'afif.al.fakri@gmail.com',
                'password' => bcrypt('developer'),
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Administrator',
                'email' => 'administrator@gmail.com',
                'password' => bcrypt('admin'),
                'created_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
