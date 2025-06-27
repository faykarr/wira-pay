<?php

namespace App\Http\Controllers;

use App\Http\Requests\Payments\PaymentsRequest;
use App\Models\Akademik;
use App\Models\Payments;
use App\Models\PaymentsSummary;
use App\Models\Siswa;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data = [
            'akademik' => Akademik::orderBy('tahun_akademik', 'desc')->get(),
            'payments' => Payments::with(['siswa.akademik'])->get(),
        ];
        return view('transaksi.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('transaksi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PaymentsRequest $request, Payments $payments)
    {
        $data = $request->all();
        $payments->create([
            'siswa_id' => $data['siswa_id'],
            'kode_transaksi' => $data['kode_transaksi'],
            'jenis_pembayaran' => $data['jenis_pembayaran'],
            'angsuran' => $data['angsuran'],
            'nominal' => $data['nominal'],
            // Use the date from input, but current time
            'tanggal_transaksi' => Carbon::parse($data['created_at'])->setTimeFrom(Carbon::now())->format('Y-m-d H:i:s'),
        ]);
        return redirect()->route('payments.index')->with('success', 'Pembayaran berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Payments $payments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payments $payments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payments $payments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payments $payments)
    {
        $payments->delete();
    }

    /**
     * Get data for DataTables.
     */
    public function data(Request $request)
    {
        $payments = Payments::with(['siswa'])->orderBy('tanggal_transaksi', 'desc')->get();
        return datatables()
            ->of($payments)
            ->addIndexColumn()
            ->editColumn('kode_transaksi', function ($payment) {
                return '<span class="badge bg-success-subtle text-success border-success border fs-2">' . $payment->kode_transaksi . '</span>';
            })
            ->editColumn('siswa.nit', function ($payment) {
                return '<h6 class="mb-1 fw-bolder">' . ucwords(strtolower($payment->siswa->nit)) . '</h6>';
            })
            ->editColumn('siswa.nama_lengkap', function ($payment) {
                return '<h6 class="mb-1 fw-bolder">' . ucwords(strtolower($payment->siswa->nama_lengkap)) . '</h6>';
            })
            ->editColumn('nominal', function ($payment) {
                return '<span class="badge bg-success-subtle rounded-pill text-success border-success border fs-2">Rp ' . number_format($payment->nominal, 0, ',', '.') . '</span>';
            })
            ->editColumn('tanggal_transaksi', function ($payment) {
                return '<span class="badge bg-primary-subtle rounded-pill text-primary border-primary border fs-2">' . Carbon::parse($payment->tanggal_transaksi)->locale('id')->isoFormat('D MMMM Y') . '</span>';
            })
            ->addColumn('action', function ($payments) {
                $lihatUrl = route('siswa.show', $payments->siswa_id);
                $cetakUrl = route('payments.show', $payments->id);
                return '
                <div class="btn-group">
                <a href="' . $lihatUrl . '" class="btn btn-sm btn-primary text-white"><i class="ti ti-eye fs-4 me-1"></i>Siswa</a>
                </div>
            ';
            })
            ->rawColumns(['kode_transaksi', 'siswa.nit', 'siswa.nama_lengkap', 'nominal', 'tanggal_transaksi', 'action'])
            ->make(true);
    }

    /**
     * Fetch information for payments.
     */
    public function fetchInfo(Request $request)
    {
        $nit = $request->nit;
        $jenisPembayaran = $request->jenis_pembayaran;

        $siswa = Siswa::with('akademik')->where('nit', $nit)->first();
        if (!$siswa) {
            return response()->json(['error' => 'Siswa tidak ditemukan!'], 404);
        }

        // Ambil status dari payments_summary
        $summary = PaymentsSummary::where('siswa_id', $siswa->id)->first();
        if ($jenisPembayaran == 'Registrasi' && $summary && $summary->status_registration == 'Lunas') {
            return response()->json(['error' => 'Siswa ini sudah lunas di pembayaran Registrasi!'], 422);
        }
        if ($jenisPembayaran == 'SPI' && $summary && $summary->status_spi == 'Lunas') {
            return response()->json(['error' => 'Siswa ini sudah lunas di pembayaran SPI!'], 422);
        }

        $remaining = $jenisPembayaran == 'Registrasi' ? $summary->remaining_registration : $summary->remaining_spi;

        // Ambil pembayaran terakhir berdasarkan jenis pembayaran
        $lastPayment = Payments::where('siswa_id', $siswa->id)
            ->where('jenis_pembayaran', $jenisPembayaran)
            ->orderByDesc('angsuran')
            ->first();

        // Format Kode Transaksi
        $lastTrans = Payments::where('jenis_pembayaran', $jenisPembayaran)->orderByDesc('id')->first();
        $nextKode = str_pad(($lastTrans ? ((int) substr($lastTrans->kode_transaksi, 2, 3)) + 1 : 1), 3, '0', STR_PAD_LEFT);
        $prefix = $jenisPembayaran == 'Registrasi' ? 'RG' : 'SP';
        $kodeTransaksi = $prefix . $nextKode . '-' . now()->format('my');

        // Angsuran ke (jika belum pernah bayar, maka 1)
        $angsuranKe = $lastPayment ? ($lastPayment->angsuran + 1) : 1;
        $angsuranName = $jenisPembayaran == 'Registrasi' ? 'Angsuran ke ' : 'Semester ';

        // Status pembayaran
        $status = $lastPayment ? "Pembayaran terakhir di " . $angsuranName . $lastPayment->angsuran : "Belum ada pembayaran";

        return response()->json([
            'nama_lengkap' => $siswa->nama_lengkap,
            'tahun_akademik' => $siswa->akademik->tahun_akademik ?? '',
            'status_pembayaran' => $status,
            'kode_transaksi' => $kodeTransaksi,
            'angsuran_ke' => $angsuranKe,
            'siswa_id' => $siswa->id,
            'remaining' => 'Rp ' . number_format($remaining, 0, ',', '.'),
        ]);
    }
}
