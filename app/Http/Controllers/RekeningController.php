<?php

namespace App\Http\Controllers;

use App\Models\Rekening;
use Illuminate\Http\Request;

class RekeningController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rekening = Rekening::all();
        return view('rekening.index', compact('rekening'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rekening.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_rekening' => 'unique:rekening,kode_rekening',
        ]);

        Rekening::create([
            'kode_rekening' => $request->kode_rekening,
            'nama_rekening' => $request->nama_rekening,
        ]);
        return redirect()->route('rekening.index')->with('success', 'Data berhasil disimpan');
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
        $rekening = Rekening::find($id);
        return view('rekening.edit', compact('rekening'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode_rekening' => 'unique:rekening,kode_rekening',
        ]);

        $data = ([
            'kode_rekening' => $request->kode_rekening,
            'nama_rekening' => $request->nama_rekening,
        ]);

        $rekening = Rekening::find($id);
        $rekening->update($data);
        return redirect()->route('rekening.index')->with('success', 'Data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Rekening::find($id)->delete();
        return redirect()->route('rekening.index')->with('success', 'Data berhasil dihapus');
    }
}
