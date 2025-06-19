<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Akademik;

class AkademikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $startYear = 2000;
        $jumlahData = 2000;

        for ($i = 0; $i < $jumlahData; $i++) {
            $tahunAwal = $startYear + $i;
            $tahunAkhir = $tahunAwal + 1;

            Akademik::create([
                'tahun_akademik' => "{$tahunAwal}/{$tahunAkhir}"
            ]);
        }
    }
}
