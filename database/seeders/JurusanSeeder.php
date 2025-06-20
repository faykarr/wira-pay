<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jumlahData = 100;
        for ($i = 0; $i < $jumlahData; $i++) {
            Jurusan::create([
                'nama_jurusan' => "Teknik Informatika " . ($i + 1),
            ]);
        }
    }
}
