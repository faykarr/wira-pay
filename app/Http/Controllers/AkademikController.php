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
        // Go to view with all akademik data
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Akademik $akademik)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Akademik $akademik)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Akademik $akademik)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Akademik $akademik)
    {
        //
    }
}
