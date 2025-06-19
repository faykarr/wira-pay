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
    public function index(Akademik $akademik)
    {
        $data = $akademik->orderBy('tahun_akademik')->get();
        // Go to view with all akademik data
        return view('akademik.index', compact('data'));
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
}
