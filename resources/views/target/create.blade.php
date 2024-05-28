@extends('layouts.main')

@section('title')
    Tambah Target
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
                    <h3>Target</h3>
                    <p class="text-subtitle text-muted">Tambah Target.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Tambah Target
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
                        <form class="form form-vertical" action="{{ route('target.store') }}" method="POST">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Kode Rekening</label>
                                            <select id="kode_rekening" name="kode_rekening" class="form-select mt-2">
                                                <option value="">Pilih Kode Rekening</option>
                                                @foreach ($rekening as $row)
                                                    <option value="{{ $row->kode_rekening }}" data-nama="{{ $row->nama_rekening }}">{{ $row->kode_rekening }}</option>
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
                                            <label for="first-name-vertical">Target Rp.</label>
                                            <input type="number" name="target" class="form-control mt-2" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Periode</label>
                                            <select name="periode_id" class="form-select mt-2">
                                                <option value="">Pilih Periode</option>
                                                @foreach ($periode as $row)
                                                    <option value="{{ $row->periode_id }}">{{ $row->awal_masa }} - {{ $row->akhir_masa }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <a href="{{ route('target.index') }}"
                                            class="btn btn-warning me-1 mb-1">Kembali</a>
                                        <button type="reset" class="btn btn-secondary me-1 mb-1">
                                            Reset
                                        </button>
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
        document.getElementById('kode_rekening').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            var namaRekening = selectedOption.getAttribute('data-nama');
            document.getElementById('nama_rekening').value = namaRekening ? namaRekening : '';
        });
        </script>
@endsection
