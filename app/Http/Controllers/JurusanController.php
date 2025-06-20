<?php

namespace App\Http\Controllers;

use App\Http\Requests\Jurusan\StoreJurusanRequest;
use App\Http\Requests\Jurusan\UpdateJurusanRequest;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('jurusan.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jurusan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJurusanRequest $request, Jurusan $jurusan)
    {
        $jurusan->create($request->validated());
        return redirect()->route('jurusan.index')->with('success', 'Jurusan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jurusan $jurusan)
    {
        return view('jurusan.show', compact('jurusan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jurusan $jurusan)
    {
        return view('jurusan.edit', compact('jurusan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJurusanRequest $request, Jurusan $jurusan)
    {
        $jurusan->update($request->validated());
        return redirect()->route('jurusan.index')->with('success', 'Jurusan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jurusan $jurusan)
    {
        $jurusan->delete();
    }

    /**
     * Get data for DataTables.
     */
    public function data(Jurusan $jurusan)
    {
        $data = $jurusan->orderBy('id')->withCount('siswa')->get();
        return datatables()->of($data)
            ->addIndexColumn()
            ->addColumn('jumlah_siswa', fn($row) => $row->siswa_count . ' Siswa')
            ->addColumn('action', function ($row) {
                $editUrl = route('jurusan.edit', $row->id);
                $showUrl = route('jurusan.show', $row->id);
                $deleteUrl = route('jurusan.destroy', $row->id);
                return '
                <div class="btn-group">
                    <a href="' . $showUrl . '" class="btn btn-sm btn-success">Lihat</a>
                    <a href="' . $editUrl . '" class="btn btn-sm btn-warning">Edit</a>
                    <button class="btn btn-sm btn-danger btn-delete" data-url="' . $deleteUrl . '">Hapus</button>
                </div>
            ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
