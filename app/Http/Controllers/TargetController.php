<?php

namespace App\Http\Controllers;

use App\Models\Periode;
use App\Models\Rekening;
use App\Models\Target;
use Illuminate\Http\Request;

class TargetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $target = Target::all();
        return view('target.index', compact('target'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rekening = Rekening::all();
        $periode = Periode::all();
        return view('target.create', compact('rekening', 'periode'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_rekening' => 'required',
            'target' => 'required',
            'periode_id' => 'required',
        ]);

        Target::create([
            'kode_rekening' => $request->kode_rekening,
            'target' => $request->target,
            'periode_id' => $request->periode_id,
        ]);
        return redirect()->route('target.index')->with('success', 'Data berhasil disimpan');
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
        $target = Target::find($id);
        $rekening = Rekening::all();
        $periode = Periode::all();
        return view('target.edit', compact('target', 'rekening', 'periode'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode_rekening' => 'required',
            'target' => 'required',
            'periode_id' => 'required',
        ]);

        $data = ([
            'kode_rekening' => $request->kode_rekening,
            'target' => $request->target,
            'periode_id' => $request->periode_id,
        ]);
        $target = Target::find($id);
        $target->update($data);
        return redirect()->route('target.index')->with('success', 'Data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $target = Target::find($id)->delete();
        return redirect()->route('target.index')->with('success', 'Data berhasil dihapus');
    }
}
