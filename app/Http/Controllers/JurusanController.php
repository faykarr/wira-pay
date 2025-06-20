<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Jurusan $jurusan)
    {
        return view('jurusan.index');
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
    public function show(Jurusan $jurusan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jurusan $jurusan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jurusan $jurusan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jurusan $jurusan)
    {
        //
    }

    /**
     * Get data for DataTables.
     */
    public function data(Jurusan $jurusan)
    {
        $data = $jurusan->orderBy('id')->get();
        return datatables()->of($data)
            ->addIndexColumn()
            ->addColumn('jumlah_siswa', fn($row) => '0 Siswa')
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
