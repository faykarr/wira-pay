<?php

namespace App\Http\Controllers;

use App\Models\Payments;
use App\Models\Akademik;
use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Tahun akademik saat ini
        $currentAkademik = date('n') <= 6 ? (date('Y') - 1) . '/' . date('Y') : date('Y') . '/' . (date('Y') + 1);
        
        // Tahun akademik yang dipilih (dari filter atau default)
        $selectedAkademik = $request->get('tahun_akademik', $currentAkademik);
        
        // Daftar tahun akademik untuk dropdown
        $akademikList = Akademik::orderBy('tahun_akademik', 'desc')
            ->pluck('tahun_akademik', 'tahun_akademik')
            ->map(function ($tahun) {
                return "Tahun Akademik {$tahun}";
            });

        $data = [
            'current_akademik' => $currentAkademik,
            'selected_akademik' => $selectedAkademik,
            'akademik_list' => $akademikList,
            'latest_transactions' => $this->getLatestTransactions(),
            'siswa_belum_lunas' => $this->getCountSiswaBelumLunas($selectedAkademik),
            'total_pembayaran' => $this->getTotalPembayaranTahunIni($selectedAkademik),
            'pemasukan_tahun' => $this->getGrafikPemasukanLimaTahun(),
            'count_transactions' => $this->getCountTransactionsTahunIni($selectedAkademik),
            'pemasukan_semester' => $this->getPemasukanPerSemester($selectedAkademik),
            'pemasukan_semester_historis' => $this->getGrafikPemasukanHistorisSemester($selectedAkademik, 6),
            'persentase_siswa' => $this->getPersentaseLunasDanBelumLunasSemuaTahun($selectedAkademik),
            'count_siswa' => $this->getCountSiswaLunasDanBelumLunasBerdasarkanTahun($selectedAkademik),
            'persentase_lunas' => $this->getPersentaseLunasSemuaTahun(),
        ];
        return view('dashboard.index', compact('data'));
    }

    public function getCountSiswaBelumLunas($tahunAkademik = null)
    {
        if (!$tahunAkademik) {
            $tahunAkademik = date('n') <= 6 ? (date('Y') - 1) . '/' . date('Y') : date('Y') . '/' . (date('Y') + 1);
        }

        return DB::table('payments_summary')
            ->where('tahun_akademik', $tahunAkademik)
            ->where(function ($q) {
                $q->where('status_registration', '!=', 'Lunas')
                    ->orWhere('status_spi', '!=', 'Lunas');
            })
            ->count();
    }

    public function getTotalPembayaranTahunIni($tahunAkademik = null)
    {
        if (!$tahunAkademik) {
            $tahunAkademik = date('n') <= 6 ? (date('Y') - 1) . '/' . date('Y') : date('Y') . '/' . (date('Y') + 1);
        }

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

    public function getCountTransactionsTahunIni($tahunAkademik = null)
    {
        if (!$tahunAkademik) {
            $tahun = date('n') <= 6 ? date('Y') - 1 : date('Y');
            $tahunAkademik = "{$tahun}/" . ($tahun + 1);
        }

        return Payments::whereHas('siswa.akademik', function ($query) use ($tahunAkademik) {
            $query->where('tahun_akademik', $tahunAkademik);
        })
            ->count();
    }

    public function getPemasukanPerSemester($tahunAkademik = null)
    {
        if (!$tahunAkademik) {
            $tahun = date('n') <= 6 ? date('Y') - 1 : date('Y');
            $tahunAkademik = "{$tahun}/" . ($tahun + 1);
        }

        // Parse tahun akademik untuk mendapatkan tahun mulai dan akhir
        $years = explode('/', $tahunAkademik);
        $startYear = (int) $years[0];
        $endYear = (int) $years[1];

        // Semester 1: Juli - Desember (tahun pertama)
        $semester1 = DB::table('payments')
            ->join('siswa', 'siswa.id', '=', 'payments.siswa_id')
            ->join('akademik', 'akademik.id', '=', 'siswa.akademik_id')
            ->where('akademik.tahun_akademik', $tahunAkademik)
            ->whereIn('payments.jenis_pembayaran', ['SPI', 'Registrasi'])
            ->whereYear('payments.tanggal_transaksi', $startYear)
            ->whereMonth('payments.tanggal_transaksi', '>=', 7)
            ->selectRaw('payments.jenis_pembayaran, SUM(payments.nominal) as total')
            ->groupBy('payments.jenis_pembayaran')
            ->get()
            ->keyBy('jenis_pembayaran');

        // Semester 2: Januari - Juni (tahun kedua)  
        $semester2 = DB::table('payments')
            ->join('siswa', 'siswa.id', '=', 'payments.siswa_id')
            ->join('akademik', 'akademik.id', '=', 'siswa.akademik_id')
            ->where('akademik.tahun_akademik', $tahunAkademik)
            ->whereIn('payments.jenis_pembayaran', ['SPI', 'Registrasi'])
            ->whereYear('payments.tanggal_transaksi', $endYear)
            ->whereMonth('payments.tanggal_transaksi', '<=', 6)
            ->selectRaw('payments.jenis_pembayaran, SUM(payments.nominal) as total')
            ->groupBy('payments.jenis_pembayaran')
            ->get()
            ->keyBy('jenis_pembayaran');

        return [
            'semester_1' => [
                'label' => "Jul-Des {$startYear}",
                'spi' => $semester1->get('SPI')->total ?? 0,
                'registrasi' => $semester1->get('Registrasi')->total ?? 0,
            ],
            'semester_2' => [
                'label' => "Jan-Jun {$endYear}",
                'spi' => $semester2->get('SPI')->total ?? 0,
                'registrasi' => $semester2->get('Registrasi')->total ?? 0,
            ]
        ];
    }

    public function getGrafikPemasukanHistorisSemester($selectedAkademik = null, $limitSemester = 6)
    {
        // Jika tidak ada tahun akademik yang dipilih, gunakan tahun akademik saat ini
        if (!$selectedAkademik) {
            $selectedAkademik = date('n') <= 6 ? (date('Y') - 1) . '/' . date('Y') : date('Y') . '/' . (date('Y') + 1);
        }

        // Parse tahun akademik yang dipilih
        $years = explode('/', $selectedAkademik);
        $startYear = (int) $years[0];
        
        $result = [];
        $semesterCount = 0;

        // Generate semester mulai dari tahun akademik yang dipilih ke depan
        for ($i = 0; $semesterCount < $limitSemester; $i++) {
            $currentStartYear = $startYear + $i;
            $currentTahunAkademik = "{$currentStartYear}/" . ($currentStartYear + 1);
            
            // Semester 1: Juli - Desember (tahun pertama)
            if ($semesterCount < $limitSemester) {
                // Ambil data SPI dan Registrasi terpisah untuk semester 1
                $semester1Data = DB::table('payments')
                    ->join('siswa', 'siswa.id', '=', 'payments.siswa_id')
                    ->join('akademik', 'akademik.id', '=', 'siswa.akademik_id')
                    ->where('akademik.tahun_akademik', $selectedAkademik) // Filter berdasarkan tahun akademik siswa
                    ->whereIn('payments.jenis_pembayaran', ['SPI', 'Registrasi'])
                    ->whereYear('payments.tanggal_transaksi', $currentStartYear)
                    ->whereMonth('payments.tanggal_transaksi', '>=', 7)
                    ->selectRaw('payments.jenis_pembayaran, SUM(payments.nominal) as total')
                    ->groupBy('payments.jenis_pembayaran')
                    ->get()
                    ->keyBy('jenis_pembayaran');

                $spi1 = $semester1Data->get('SPI')->total ?? 0;
                $registrasi1 = $semester1Data->get('Registrasi')->total ?? 0;

                $result[] = [
                    'period' => "Jul-Des {$currentStartYear}",
                    'spi' => (int) $spi1,
                    'registrasi' => (int) $registrasi1,
                    'total' => (int) ($spi1 + $registrasi1)
                ];
                $semesterCount++;
            }

            // Semester 2: Januari - Juni (tahun kedua)  
            if ($semesterCount < $limitSemester) {
                // Ambil data SPI dan Registrasi terpisah untuk semester 2
                $semester2Data = DB::table('payments')
                    ->join('siswa', 'siswa.id', '=', 'payments.siswa_id')
                    ->join('akademik', 'akademik.id', '=', 'siswa.akademik_id')
                    ->where('akademik.tahun_akademik', $selectedAkademik) // Filter berdasarkan tahun akademik siswa
                    ->whereIn('payments.jenis_pembayaran', ['SPI', 'Registrasi'])
                    ->whereYear('payments.tanggal_transaksi', $currentStartYear + 1)
                    ->whereMonth('payments.tanggal_transaksi', '<=', 6)
                    ->selectRaw('payments.jenis_pembayaran, SUM(payments.nominal) as total')
                    ->groupBy('payments.jenis_pembayaran')
                    ->get()
                    ->keyBy('jenis_pembayaran');

                $spi2 = $semester2Data->get('SPI')->total ?? 0;
                $registrasi2 = $semester2Data->get('Registrasi')->total ?? 0;

                $result[] = [
                    'period' => "Jan-Jun " . ($currentStartYear + 1),
                    'spi' => (int) $spi2,
                    'registrasi' => (int) $registrasi2,
                    'total' => (int) ($spi2 + $registrasi2)
                ];
                $semesterCount++;
            }
        }

        return $result;
    }

    public function getPersentaseLunasDanBelumLunasSemuaTahun($tahunAkademik = null)
    {
        if (!$tahunAkademik) {
            $tahunAkademik = date('n') <= 6 ? (date('Y') - 1) . '/' . date('Y') : date('Y') . '/' . (date('Y') + 1);
        }

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

    public function getCountSiswaLunasDanBelumLunasBerdasarkanTahun($tahunAkademik = null)
    {
        if (!$tahunAkademik) {
            $tahunAkademik = date('n') <= 6 ? (date('Y') - 1) . '/' . date('Y') : date('Y') . '/' . (date('Y') + 1);
        }

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
