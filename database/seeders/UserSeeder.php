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
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('Admin123'),
            'npm' => '',
            'role' => 'admin'
        ]);

        //---Mahasiswa Seeder---
        //   PASTIKAN NPM ADA PADA TABEL MATAKULIAH, JIKA TIDAK TAMBAH DULU NPM DAN NAMA PADA TABEL MAHASISWA LEWAT WEB

        DB::table('users')->insert([
            'name' => 'Tolut',
            'email' => 'tolut@example.com',
            'password' => Hash::make('Tolut123'),
            'npm' => '5520124031',
            'role' => 'mahasiswa'
        ]);

        
        DB::table('users')->insert([
            'name' => 'Arion',
            'email' => 'ArionPutra@example.com',
            'password' => Hash::make('Ari123'),
            'npm' => '5520124022',
            'role' => 'mahasiswa'
        ]);


    }
}
