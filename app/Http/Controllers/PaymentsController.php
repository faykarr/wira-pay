<?php

namespace App\Http\Controllers;

use App\Models\Akademik;
use App\Models\Payments;
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $payments = Payments::with(['siswa'])->orderBy('created_at', 'desc')->get();
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
            ->editColumn('created_at', function ($payment) {
                return '<span class="badge bg-primary-subtle rounded-pill text-primary border-primary border fs-2">' . $payment->created_at->locale('id')->isoFormat('D MMMM Y') . '</span>';
            })
            ->addColumn('action', function ($payments) {
                $lihatUrl = route('payments.show', $payments->id);
                $cetakUrl = route('payments.show', $payments->id);
                return '
                <div class="btn-group">
                <a href="' . $cetakUrl . '" class="btn btn-sm btn-danger text-white"><i class="ti ti-printer fs-4"></i></a>
                <a href="' . $lihatUrl . '" class="btn btn-sm btn-primary text-white"><i class="ti ti-eye fs-4 me-1"></i>Siswa</a>
                </div>
            ';
            })
            ->rawColumns(['kode_transaksi', 'siswa.nit', 'siswa.nama_lengkap', 'nominal', 'created_at', 'action'])
            ->make(true);
    }
}
