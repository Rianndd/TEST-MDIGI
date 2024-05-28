<?php

namespace App\Http\Controllers;

use App\Models\Rekening;
use App\Models\TransaksiHarian;
use Illuminate\Http\Request;

class TransaksiHarianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaksi = TransaksiHarian::all();
        return view('transaksi.index', compact('transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rekening = Rekening::all();
        return view('transaksi.create', compact('rekening'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_rekening' => 'required',
            'via_bayar' => 'required',
            'tanggal_setor' => 'required',
            'jumlah_bayar' => 'required',
        ]);

        TransaksiHarian::create([
            'kode_rekening' => $request->kode_rekening,
            'via_bayar' => $request->via_bayar,
            'tanggal_setor' => $request->tanggal_setor,
            'jumlah_bayar' => $request->jumlah_bayar,
        ]);
        return redirect()->route('transaksi_harian.index')->with('success', 'Data berhasil disimpan');
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
        $transaksi = TransaksiHarian::find($id);
        $rekening = Rekening::all();
        return view('transaksi.edit', compact('transaksi', 'rekening'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode_rekening' => 'required',
            'via_bayar' => 'required',
            'tanggal_setor' => 'required',
            'jumlah_bayar' => 'required',
        ]);

        $data = ([
            'kode_rekening' => $request->kode_rekening,
            'via_bayar' => $request->via_bayar,
            'tanggal_setor' => $request->tanggal_setor,
            'jumlah_bayar' => $request->jumlah_bayar,
        ]);
        $transaksi = TransaksiHarian::find($id);
        $transaksi->update($data);
        return redirect()->route('transaksi_harian.index')->with('success', 'Data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        TransaksiHarian::find($id)->delete();
        return redirect()->route('transaksi_harian.index')->with('success', 'Data berhasil dihapus');
    }
}
