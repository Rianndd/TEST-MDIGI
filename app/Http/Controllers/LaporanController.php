<?php

namespace App\Http\Controllers;

use App\Models\Periode;
use App\Models\Target;
use App\Models\TransaksiHarian;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $periodes = Periode::orderBy('awal_masa', 'desc')->get();
        return view('laporan.index', compact('periodes'));
    }

    public function pendapatan(Request $request)
    {
        $periode_id = $request->input('periode_id');
        $akhir_masa = $request->input('akhir_masa');
        $via_bayar = $request->input('via_bayar');

        $periode = Periode::find($periode_id);
        $awal_masa = $periode->awal_masa;

        // Memfilter data target berdasarkan periode yang dipilih
        $targets = Target::with(['rekening', 'periode'])
            ->where('periode_id', $periode_id)
            ->get();

        $data = $targets->map(function ($target) use ($akhir_masa, $via_bayar) {
            $query = TransaksiHarian::where('kode_rekening', $target->kode_rekening)
                ->where('tanggal_setor', '<=', $akhir_masa);

            // Memfilter data berdasarkan via bayar jika terdapat nilai $via_bayar yang valid
            if ($via_bayar) {
                $query->where('via_bayar', $via_bayar);
            }

            $sampaiBulanLalu = clone $query;
            $sampaiBulanLalu = $sampaiBulanLalu->where('tanggal_setor', '<', date('Y-m-01', strtotime($akhir_masa)))
                ->sum('jumlah_bayar');

            $bulanIni = clone $query;
            $bulanIni = $bulanIni->whereBetween('tanggal_setor', [date('Y-m-01', strtotime($akhir_masa)), $akhir_masa])
                ->sum('jumlah_bayar');

            $sampaiBulanIni = $sampaiBulanLalu + $bulanIni;

            return [
                'kode_rekening' => $target->kode_rekening,
                'nama_rekening' => $target->rekening->nama_rekening,
                'target' => $target->target,
                'sampai_bulan_lalu' => $sampaiBulanLalu,
                'bulan_ini' => $bulanIni,
                'sampai_bulan_ini' => $sampaiBulanIni,
                'realisasi' => $sampaiBulanIni / $target->target * 100,
            ];
        });

        return view('laporan.pendapatan', compact('data', 'periode', 'akhir_masa', 'via_bayar'));
    }
}
