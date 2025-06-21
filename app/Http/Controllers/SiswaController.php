<?php

namespace App\Http\Controllers;

use App\Http\Requests\Siswa\StoreSiswaRequest;
use App\Http\Requests\Siswa\UpdateSiswaRequest;
use App\Models\Akademik;
use App\Models\Jurusan;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'akademik' => Akademik::all(),
            'jurusan' => Jurusan::all()
        ];
        // Go to view siswa.index and send the data from model.
        return view("siswa.index", compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'akademik' => Akademik::all(),
            'jurusan' => Jurusan::all()
        ];
        // Go to view siswa.add
        return view("siswa.create", compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSiswaRequest $request, Siswa $siswa)
    {
        // Validate the request and create a new siswa record
        $siswa->create([
            'nit' => $request->NIT,
            'nama_lengkap' => strtoupper($request->fullName),
            'akademik_id' => $request->akademik,
            'jurusan_id' => $request->jurusan,
        ]);
        return redirect()->route('siswa.index')->with('success', 'Data siswa baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        $siswa->load(['akademik', 'jurusan']);
        return view("siswa.show", compact('siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa)
    {
        $data = [
            'akademik' => Akademik::all(),
            'jurusan' => Jurusan::all(),
            'siswa' => $siswa
        ];
        // Go to view siswa.edit and send the data from model.
        return view("siswa.edit", compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSiswaRequest $request, Siswa $siswa)
    {
        // Validate the request and update the siswa record
        $siswa->update([
            'nit' => $request->NIT,
            'nama_lengkap' => strtoupper($request->fullName),
            'akademik_id' => $request->akademik,
            'jurusan_id' => $request->jurusan,
        ]);
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswa $siswa)
    {
        $siswa->delete();
    }

    // Function to get data for datatables
    public function data(Siswa $siswa)
    {
        $data = $siswa->with(['akademik', 'jurusan'])->orderBy('nit', 'asc')->get();
        return datatables()->of($data)
            ->addIndexColumn()
            ->addColumn('tahun_akademik', function ($row) {
                return $row->akademik ? $row->akademik->tahun_akademik : '-';
            })
            ->addColumn('nama_jurusan', function ($row) {
                return $row->jurusan ? $row->jurusan->nama_jurusan : '-';
            })
            ->addColumn('status_registrasi', fn($row) => '<span class="badge bg-success">Sudah Lunas</span>')
            ->addColumn('status_spi', fn($row) => '<span class="badge bg-danger">Belum Lunas</span>')
            ->addColumn('action', function ($row) {
                $editUrl = route('siswa.edit', $row->id);
                $showUrl = route('siswa.show', $row->id);
                $deleteUrl = route('siswa.destroy', $row->id);
                return '
                <div class="btn-group">
                    <a href="' . $showUrl . '" class="btn btn-sm btn-primary"><i class="ti ti-eye fs-4"></i></a>
                    <a href="' . $editUrl . '" class="btn btn-sm btn-success text-white"><i class="ti ti-pencil fs-4"></i></a>
                    <button class="btn btn-sm btn-danger btn-delete" data-url="' . $deleteUrl . '"><i class="ti ti-trash fs-4"></i></button>
                </div>
            ';
            })
            ->rawColumns(['status_registrasi', 'status_spi', 'action'])
            ->make(true);
    }
}
