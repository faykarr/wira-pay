<?php

namespace App\Http\Controllers;

use App\Models\Akademik;
use Illuminate\Http\Request;

class AkademikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Akademik::orderBy('tahun_akademik')->get();
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
    public function store(Request $request)
    {
        $request->validate([
            'tahun_akademik' => 'required|string|max:20|unique:akademik,tahun_akademik',
        ]);
        // Create a new akademik entry
        Akademik::create([
            'tahun_akademik' => $request->tahun_akademik,
        ]);
        return redirect()->route('akademik.index')->with('success', 'Data akademik berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Go to view to show the specified akademik entry
        $data = Akademik::find($id);
        return view('akademik.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Go to view to edit the specified akademik entry
        $data = Akademik::find($id);
        return view('akademik.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tahun_akademik' => 'required|string|max:20|unique:akademik,tahun_akademik,' . $id,
        ]);
        // Update the specified akademik entry
        $akademik = Akademik::find($id);
        $data = [
            'tahun_akademik' => $request->tahun_akademik,
        ];
        $akademik->update($data);
        return redirect()->route('akademik.index')->with('success', 'Data akademik berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Delete the specified akademik entry
        Akademik::destroy($id);
    }
}
