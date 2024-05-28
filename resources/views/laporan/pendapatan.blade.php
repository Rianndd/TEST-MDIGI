@extends('layouts.main')

@section('title')
    Laporan
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('dist/assets/extensions/simple-datatables/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/assets/compiled/css/table-datatable.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/assets/extensions/@fortawesome/fontawesome-free/css/all.min.css') }}">
@endsection

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Laporan</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Laporan
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header text-center">
                    <h4>
                        LAPORAN PENDAPATAN ASLI DAERAH 
                        @if ($via_bayar == '1')
                            VIA BENDAHARA
                        @elseif ($via_bayar == '2')
                            VIA BANK
                        @endif
                        TAHUN {{ date('Y', strtotime($akhir_masa)) }}
                    </h4>
                    <p>s/d Tanggal: {{ $akhir_masa }}</p>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered" id="table1">
                        <thead>
                            <tr>
                                <th colspan="4"></th>
                                <th colspan="3" class="text-center">Realisasi</th>
                                <th></th>
                            </tr>
                            <tr>
                                <th width="5%" class="text-center">NO</th>
                                <th width="7%" class="text-center">KODE REKENING</th>
                                <th class="text-center">NAMA REKENING</th>
                                <th class="text-center">TARGET (Rp.)</th>
                                <th class="text-center">s/d Bulan Lalu</th>
                                <th class="text-center">Bulan Ini</th>
                                <th class="text-center">s/d Bulan Ini</th>
                                <th class="text-center">%</th>
                            </tr>
                            <tr>
                                <th width="5%" class="text-center">1</th>
                                <th width="7%" class="text-center">2</th>
                                <th class="text-center">3</th>
                                <th class="text-center">4</th>
                                <th class="text-center">5</th>
                                <th class="text-center">6</th>
                                <th class="text-center">7</th>
                                <th class="text-center">8 (7/4)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item['kode_rekening'] }}</td>
                                    <td>{{ $item['nama_rekening'] }}</td>
                                    <td class="text-end">{{ number_format($item['target']) }}</td>
                                    <td class="text-end">{{ number_format($item['sampai_bulan_lalu']) }}</td>
                                    <td class="text-end">{{ number_format($item['bulan_ini']) }}</td>
                                    <td class="text-end">{{ number_format($item['sampai_bulan_ini']) }}</td>
                                    <td class="text-center">{{ number_format($item['realisasi']) }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="3">TOTAL</td>
                                <td class="text-end">{{ number_format($data->sum('target')) }}</td>
                                <td class="text-end">{{ number_format($data->sum('sampai_bulan_lalu')) }}</td>
                                <td class="text-end">{{ number_format($data->sum('bulan_ini')) }}</td>
                                <td class="text-end">{{ number_format($data->sum('sampai_bulan_ini')) }}</td>
                                <td class="text-center">{{ number_format($data->sum('realisasi') / $data->count()) }}</td>
                            </tr>
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
    <script src="{{ asset('dist/assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('dist/assets/static/js/pages/simple-datatables.js') }}"></script>
@endsection
