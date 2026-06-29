<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use App\Models\dosen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mahasiswa::factory()
            ->for(dosen::factory())
            ->count(2)->create(['nidn' => '4420124022']);
    }
}
