@extends('layouts.main')

@section('title')
    Target
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
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Target
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible show fade">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <div>
                                Data Target
                            </div>
                        </div>
                        <div class="col-md-6 text-end">
                            <a href="{{ route('target.create') }}" class="btn-btn primary">
                                <span class="fa-fw select-all fas"></span> Tambah Data
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered" id="table1">
                        <thead>
                            <tr>
                                <th class="text-center" width="10%">No</th>
                                <th>Kode Rekening</th>
                                <th>Nama Rekening</th>
                                <th>Target Rp.</th>
                                <th>Periode</th>
                                <th class="text-center" width="10%"><span class="fa-fw select-all fas"></span></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($target as $key => $row)
                                <tr>
                                    <td class="text-center">{{ $key +1 }}</td>
                                    <td class="text-center">{{ $row->kode_rekening }}</td>
                                    <td>{{ $row->rekening->nama_rekening }}</td>
                                    <td class="text-end">{{ number_format($row->target) }}</td>
                                    <td class="text-center">{{ $row->periode->awal_masa }} - {{ $row->periode->akhir_masa }}</td>
                                    <td class="text-center">
                                        <div class="d-flex">
                                            <a href="{{ route('target.edit', $row->target_id) }}" class="btn btn-sm btn-warning"><span class="fa-fw select-all fas"></span></a>
                                            <form action="{{ route('target.destroy', $row->target_id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button onclick="return confirm('Apakah anda yakin mengapus ?')"
                                                class="btn btn-danger btn-sm ms-1"><span class="fa-fw select-all fas"></span></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
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
