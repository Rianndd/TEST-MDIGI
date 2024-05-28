<?php

namespace App\Http\Controllers;

use App\Models\Periode;
use Illuminate\Http\Request;

class PeriodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $periode = Periode::all();
        return view('periode.index', compact('periode'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('periode.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'awal_masa' => 'required',
            'akhir_masa' => 'required',
        ]);

        Periode::create([
            'awal_masa' => $request->awal_masa,
            'akhir_masa' => $request->akhir_masa,
        ]);
        return redirect()->route('periode.index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $periode = Periode::find($id);
        return view('periode.edit', compact('periode'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'awal_masa' => 'required',
            'akhir_masa' => 'required',
        ]);

        $data = ([
            'awal_masa' => $request->awal_masa,
            'akhir_masa' => $request->akhir_masa,
        ]);
        $periode = Periode::find($id);
        $periode->update($data);
        return redirect()->route('periode.index')->with('success', 'Data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Periode::find($id)->delete();
        return redirect()->route('periode.index')->with('success', 'Data berhasil dihapus');
    }
}
