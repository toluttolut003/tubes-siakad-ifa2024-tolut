<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //--ADMIN SEEDER--
        // DB::table('users')->insert([
        //     'name' => 'Admin',
        //     'email' => 'admin@example.com',
        //     'password' => Hash::make('Admin123'),
        //     'npm' => '0000000000',
        //     'role' => 'admin'
        // ]);

        DB::table('users')->insert([
            'name' => 'Tolut',
            'email' => 'tolut@example.com',
            'password' => Hash::make('Tolut123'),
            'npm' => '5520124031',
            'role' => 'mahasiswa'
        ]);
    }
}
