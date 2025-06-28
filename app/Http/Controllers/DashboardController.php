<?php

namespace App\Http\Controllers;

use App\Models\Payments;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'current_akademik' => date('n') <= 6 ? (date('Y') - 1) . '/' . date('Y') : date('Y') . '/' . (date('Y') + 1),
            'latest_transactions' => $this->getLatestTransactions(),
            'siswa_belum_lunas' => $this->getCountSiswaBelumLunas(),
            'total_pembayaran' => $this->getTotalPembayaranTahunIni(),
            'pemasukan_tahun' => $this->getGrafikPemasukanLimaTahun(),
            'count_transactions' => $this->getCountTransactionsTahunIni(),
            'pemasukan_bulan' => $this->getPemasukanPerBulan(),
            'persentase_siswa' => $this->getPersentaseLunasDanBelumLunasSemuaTahun(),
            'count_siswa' => $this->getCountSiswaLunasDanBelumLunasBerdasarkanTahun(),
            'persentase_lunas' => $this->getPersentaseLunasSemuaTahun(),
        ];
        // dd($data['count_siswa']);
        return view('dashboard.index', compact('data'));
    }

    public function getCountSiswaBelumLunas()
    {
        return DB::table('payments_summary')
            ->where(function ($q) {
                $q->where('status_registration', '!=', 'Lunas')
                    ->orWhere('status_spi', '!=', 'Lunas');
            })
            ->count();
    }

    public function getTotalPembayaranTahunIni()
    {
        $tahunAkademik = date('n') <= 6 ? (date('Y') - 1) . '/' . date('Y') : date('Y') . '/' . (date('Y') + 1);

        return DB::table('payments_summary')
            ->where('tahun_akademik', $tahunAkademik)
            ->selectRaw('SUM(paid_spi) AS total_spi, SUM(paid_registration) AS total_registration')
            ->first();
    }

    public function getGrafikPemasukanLimaTahun()
    {
        return DB::table('payments')
            ->join('siswa', 'payments.siswa_id', '=', 'siswa.id')
            ->join('akademik', 'siswa.akademik_id', '=', 'akademik.id')
            ->whereIn('payments.jenis_pembayaran', ['Registrasi', 'SPI'])
            ->select('akademik.tahun_akademik', 'payments.jenis_pembayaran')
            ->selectRaw('SUM(payments.nominal) as total')
            ->groupBy('akademik.tahun_akademik', 'payments.jenis_pembayaran')
            ->orderBy('akademik.tahun_akademik', 'desc')
            ->get()
            ->groupBy('tahun_akademik')
            ->sortKeysDesc()
            ->take(5)
            ->reverse()
            ->values();
    }

    public function getCountTransactionsTahunIni()
    {
        $tahun = date('n') <= 6 ? date('Y') - 1 : date('Y');
        $tahun_akademik = "{$tahun}/" . ($tahun + 1);

        return Payments::whereHas('siswa.akademik', function ($query) use ($tahun_akademik) {
            $query->where('tahun_akademik', $tahun_akademik);
        })
            ->count();
    }

    public function getPemasukanPerBulan()
    {
        $tahun = date('n') <= 6 ? date('Y') - 1 : date('Y');
        $tahun_akademik = "{$tahun}/" . ($tahun + 1);

        return DB::table('payments')
            ->selectRaw('MONTH(payments.tanggal_transaksi) as bulan, payments.jenis_pembayaran, SUM(payments.nominal) as total')
            ->join('siswa', 'siswa.id', '=', 'payments.siswa_id')
            ->join('akademik', 'akademik.id', '=', 'siswa.akademik_id')
            ->where('akademik.tahun_akademik', $tahun_akademik)
            ->whereIn('payments.jenis_pembayaran', ['SPI', 'Registrasi'])
            ->groupByRaw('MONTH(payments.tanggal_transaksi), payments.jenis_pembayaran')
            ->get();
    }

    public function getPersentaseLunasDanBelumLunasSemuaTahun()
    {
        $tahunAkademik = date('n') <= 6 ? (date('Y') - 1) . '/' . date('Y') : date('Y') . '/' . (date('Y') + 1);

        $totalSiswa = DB::table('payments_summary')
            ->where('tahun_akademik', $tahunAkademik)
            ->count();

        $lunas = DB::table('payments_summary')
            ->where('tahun_akademik', $tahunAkademik)
            ->where('status_spi', 'Lunas')
            ->where('status_registration', 'Lunas')
            ->count();

        $belumLunas = $totalSiswa - $lunas;

        $persenLunas = $totalSiswa > 0 ? round(($lunas / $totalSiswa) * 100, 2) : 0;
        $persenBelumLunas = $totalSiswa > 0 ? round(($belumLunas / $totalSiswa) * 100, 2) : 0;

        return [
            'lunas' => $persenLunas,
            'belum_lunas' => $persenBelumLunas,
        ];
    }

    public function getCountSiswaLunasDanBelumLunasBerdasarkanTahun()
    {
        $tahunAkademik = date('n') <= 6 ? (date('Y') - 1) . '/' . date('Y') : date('Y') . '/' . (date('Y') + 1);

        // Jumlah siswa yang sudah lunas (SPI dan Registrasi)
        $lunas = DB::table('payments_summary')
            ->where('tahun_akademik', $tahunAkademik)
            ->where('status_spi', 'Lunas')
            ->where('status_registration', 'Lunas')
            ->count();

        // Jumlah siswa yang belum lunas (salah satu/both belum lunas)
        $belumLunas = DB::table('payments_summary')
            ->where('tahun_akademik', $tahunAkademik)
            ->where(function ($q) {
                $q->where('status_spi', '!=', 'Lunas')
                    ->orWhere('status_registration', '!=', 'Lunas');
            })
            ->count();

        return [
            'lunas' => $lunas,
            'belum_lunas' => $belumLunas,
            'total_siswa' => $lunas + $belumLunas,
        ];
    }

    public function getPersentaseLunasSemuaTahun()
    {
        // Ambil tahun sekarang
        $tahunSekarang = (int) (date('n') <= 6 ? date('Y') - 1 : date('Y'));

        // Buat array tahun akademik 3 tahun terakhir
        $tahunAkademik = collect(range(0, 2))->map(function ($i) use ($tahunSekarang) {
            $start = $tahunSekarang - $i;
            return $start . '/' . ($start + 1);
        })->toArray();

        // Hitung total siswa dari tahun akademik tersebut
        $totalSiswa = DB::table('payments_summary')
            ->whereIn('tahun_akademik', $tahunAkademik)
            ->count();

        // Hitung siswa yang LUNAS (SPI dan Registrasi)
        $lunas = DB::table('payments_summary')
            ->whereIn('tahun_akademik', $tahunAkademik)
            ->where('status_spi', 'Lunas')
            ->where('status_registration', 'Lunas')
            ->count();

        // Hitung persentase
        $persentase = $totalSiswa > 0 ? round(($lunas / $totalSiswa) * 100, 2) : 0;

        return [
            'persentase' => $persentase,
            'jumlah_lunas' => $lunas,
            'total_siswa' => $totalSiswa,
        ];
    }


    public function getLatestTransactions()
    {
        return Payments::with(['siswa.akademik'])
            ->orderBy('tanggal_transaksi', 'desc')
            ->take(5)
            ->get();
    }

}
