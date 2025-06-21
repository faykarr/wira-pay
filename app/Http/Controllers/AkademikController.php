<?php

namespace App\Http\Controllers;

use App\Http\Requests\Akademik\StoreAkademikRequest;
use App\Http\Requests\Akademik\UpdateAkademikRequest;
use App\Models\Akademik;
use Illuminate\Http\Request;

class AkademikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('akademik.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Go to view to create a new akademik entry
        return view('akademik.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAkademikRequest $request, Akademik $akademik)
    {
        $akademik->create($request->validated());
        return redirect()->route('akademik.index')->with('success', 'Data akademik berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Akademik $akademik)
    {
        // Go to view to show the specified akademik entry
        $data = $akademik;
        return view('akademik.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Akademik $akademik)
    {
        // Go to view to edit the specified akademik entry
        $data = $akademik;
        return view('akademik.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAkademikRequest $request, Akademik $akademik)
    {
        $data = [
            'tahun_akademik' => $request->tahun_akademik,
        ];
        $akademik->update($data);
        return redirect()->route('akademik.index')->with('success', 'Data akademik berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Akademik $akademik)
    {
        // Delete the specified akademik entry
        $akademik->delete();
    }

    /**
     * Get data for DataTables.
     */
    public function data(Akademik $akademik)
    {
        $data = $akademik->orderBy('tahun_akademik')->withCount('siswa')->get();
        return datatables()->of($data)
            ->addIndexColumn()
            ->addColumn('jumlah_siswa', fn($row) => $row->siswa_count . ' Siswa')
            ->addColumn('status_pembayaran', fn($row) => '<span class="badge bg-success">Sudah Lunas Semua</span>')
            ->addColumn('action', function ($row) {
                $editUrl = route('akademik.edit', $row->id);
                $showUrl = route('akademik.show', $row->id);
                $deleteUrl = route('akademik.destroy', $row->id);
                return '
                <div class="btn-group">
                    <a href="' . $showUrl . '" class="btn btn-sm btn-primary"><i class="ti ti-eye fs-4 me-1"></i>Lihat</a>
                    <a href="' . $editUrl . '" class="btn btn-sm btn-success text-white"><i class="ti ti-pencil fs-4 me-1"></i>Edit</a>
                    <button class="btn btn-sm btn-danger btn-delete" data-url="' . $deleteUrl . '"><i class="ti ti-trash fs-4 me-1"></i>Hapus</button>
                </div>
            ';
            })
            ->rawColumns(['status_pembayaran', 'action'])
            ->make(true);
    }
}
