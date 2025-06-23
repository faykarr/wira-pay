<?php

namespace Database\Seeders;

use App\Models\Pembayaran;
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
        $startYear = 2022;
        $jumlahData = 4;

        for ($i = 0; $i < $jumlahData; $i++) {
            $tahunAwal = $startYear + $i;
            $tahunAkhir = $tahunAwal + 1;

            Akademik::create([
                'tahun_akademik' => "{$tahunAwal}/{$tahunAkhir}"
            ]);
            Pembayaran::create([
                'akademik_id' => $i + 1, // Assuming the ID starts from 1
                'registration_fee' => 0,
                'spi_fee' => 0,
            ]);
        }
    }
}
