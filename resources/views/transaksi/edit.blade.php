@extends('layouts.main')

@section('title')
    Edit Transaksi Harian
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
                    <h3>Transaksi Harian</h3>
                    <p class="text-subtitle text-muted">Edit Transaksi Harian.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Edit Transaksi Harian
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible show fade">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <section class="section">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-vertical" action="{{ route('transaksi_harian.update', $transaksi->transaksi_id) }}"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Kode Rekening</label>
                                            <select id="kode_rekening" name="kode_rekening" class="form-select mt-2">
                                                <option value="">Pilih Kode Rekening</option>
                                                @foreach ($rekening as $row)
                                                    <option value="{{ $row->kode_rekening }}"
                                                        data-nama="{{ $row->nama_rekening }}"
                                                        {{ $transaksi->kode_rekening == $row->kode_rekening ? 'selected' : '' }}>
                                                        {{ $row->kode_rekening }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Nama Rekening</label>
                                            <input type="text" id="nama_rekening" class="form-control mt-2" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Via Bayar</label>
                                            <select name="via_bayar" class="form-select mt-2">
                                                <option value="">Pilih Via Bayar</option>
                                                <option value="1" class="form-control" {{ $transaksi->via_bayar == '1' ? 'selected' : '' }}>Bendahara</option>
                                                <option value="2" class="form-control" {{ $transaksi->via_bayar == '2' ? 'selected' : '' }}>Bank</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Tanggal Setor</label>
                                            <input type="date" name="tanggal_setor" class="form-control mt-2" value="{{ $transaksi->tanggal_setor }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Jumlah Bayar Rp.</label>
                                            <input type="number" name="jumlah_bayar" class="form-control mt-2" min="1" value="{{ $transaksi->jumlah_bayar }}" required>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <a href="{{ route('transaksi_harian.index') }}" class="btn btn-warning me-1 mb-1">Kembali</a>
                                        <button type="submit" class="btn btn-primary me-1 mb-1">
                                            Simpan
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
    <script src="{{ asset('dist/assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('dist/assets/static/js/pages/simple-datatables.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var kodeRekeningSelect = document.getElementById('kode_rekening');
            var namaRekeningInput = document.getElementById('nama_rekening');

            function updateNamaRekening() {
                var selectedOption = kodeRekeningSelect.options[kodeRekeningSelect.selectedIndex];
                var namaRekening = selectedOption.getAttribute('data-nama');
                namaRekeningInput.value = namaRekening ? namaRekening : '';
            }

            // Initial update on page load
            updateNamaRekening();

            // Update on change
            kodeRekeningSelect.addEventListener('change', updateNamaRekening);
        });
    </script>
@endsection
