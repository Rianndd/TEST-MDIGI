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
                <div class="card-header">
                </div>
                <div class="card-body">
                    <form method="GET" action="{{ route('laporan.pendapatan') }}">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="periode_id">Pilih Periode:</label>
                                <select id="periode_id" name="periode_id" class="form-select mt-2"
                                    onchange="updateMaxDate()">
                                    <option value="">Pilih Periode</option>
                                    @foreach ($periodes as $periode)
                                        <option value="{{ $periode->periode_id }}">
                                            {{ date('d-m-Y', strtotime($periode->awal_masa)) }} -
                                            {{ date('d-m-Y', strtotime($periode->akhir_masa)) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="akhir_masa">Pilih Masa Akhir:</label>
                                <input type="date" id="akhir_masa" name="akhir_masa" class="form-control mt-2"
                                    value="{{ date('Y-m-d') }}">
                            </div>
                            <div class="col-md-6">
                                <label for="via_bayar">Via Bayar:</label>
                                <select id="via_bayar" name="via_bayar" class="form-select mt-2">
                                    <option value="">Semua</option>
                                    <option value="1">Bendahara</option>
                                    <option value="2">Bank</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Lihat Laporan</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
    <script src="{{ asset('dist/assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('dist/assets/static/js/pages/simple-datatables.js') }}"></script>
    <script>
        function updateMaxDate() {
            // Mendapatkan nilai periode_id yang dipilih
            var periodeId = document.getElementById('periode_id').value;
            // Mendapatkan elemen select untuk periode
            var select = document.getElementById('periode_id');
            var selectedOption = select.options[select.selectedIndex].text;
            // Mendapatkan tahun dari periode yang dipilih (format: dd-mm-yyyy - dd-mm-yyyy)
            var tahunPeriode = selectedOption.split('-')[2].trim();
            // Mengatur nilai maksimum tanggal pada input akhir_masa
            document.getElementById('akhir_masa').setAttribute('max', tahunPeriode + '-12-31');
        }
    </script>
@endsection
