<?php

namespace App\Http\Controllers;

use App\Http\Requests\Pembayaran\UpdatePembayaranRequest;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pembayaran.index');
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
    public function show(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pembayaran $pembayaran)
    {
        $data = $pembayaran->load('akademik');
        return view('pembayaran.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePembayaranRequest $request, Pembayaran $pembayaran)
    {
        $pembayaran->update($request->validated());
        return redirect()->route('pembayaran.index')->with('success', 'Data pembayaran berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Get data for the datatable.
     */
    public function data()
    {
        $pembayaran = Pembayaran::with('akademik')->join('akademik', 'master_pembayaran.akademik_id', '=', 'akademik.id')
            ->orderBy('akademik.tahun_akademik', 'asc')
            ->get();
        return datatables()->of($pembayaran)
            ->addIndexColumn()
            ->addColumn('tahun_akademik', function ($pembayaran) {
                return $pembayaran->akademik->tahun_akademik;
            })
            ->addColumn('registration_fee', function ($pembayaran) {
                return '<span class="badge bg-success-subtle rounded-pill text-success border-success border fs-2">Rp ' . number_format($pembayaran->registration_fee, 0, ',', '.') . '</span>';
            })
            ->addColumn('spi_fee', function ($pembayaran) {
                return '<span class="badge bg-success-subtle rounded-pill text-success border-success border fs-2">Rp ' . number_format($pembayaran->spi_fee, 0, ',', '.') . '</span>';
            })
            ->addColumn('action', function ($pembayaran) {
                $editUrl = route('pembayaran.edit', $pembayaran->id);
                return '
                <div class="btn-group">
                    <a href="' . $editUrl . '" class="btn btn-sm btn-primary text-white"><i class="ti ti-settings fs-4 me-1"></i>Pengaturan</a>
                </div>
            ';
            })
            ->rawColumns(['registration_fee', 'spi_fee', 'action'])
            ->make(true);
    }
}
