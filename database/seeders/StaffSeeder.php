<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('staff')->insert([
            [
                'name' => 'Bayu Satrio',
                'date_of_birth' => '1999-06-06',
                'address' => 'Jl. Kesehatan No. 10',
                'marital_status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Marcella',
                'date_of_birth' => '1998-03-10',
                'address' => 'Jl. Riau No. 1',
                'marital_status' => 0,
                'created_at' => date('Y-m-d H:i:s'),
            ] 
        ]);
    }
}
