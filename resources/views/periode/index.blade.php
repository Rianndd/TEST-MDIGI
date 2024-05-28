@extends('layouts.main')

@section('title')
    Periode
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
                    <h3>Periode</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Periode
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
                                Data Periode
                            </div>
                        </div>
                        <div class="col-md-6 text-end">
                            <a href="{{ route('periode.create') }}" class="btn-btn primary">
                                <span class="fa-fw select-all fas"></span> Tambah Data
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th class="text-center" width="10%">No</th>
                                <th>Awal Masa</th>
                                <th>Akhir Masa</th>
                                <th class="text-center" width="10%"><span class="fa-fw select-all fas"></span></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($periode as $key => $row)
                                <tr>
                                    <td class="text-center">{{ $key +1 }}</td>
                                    <td>{{ $row->awal_masa }}</td>
                                    <td>{{ $row->akhir_masa }}</td>
                                    <td class="text-center">
                                        <div class="d-flex">
                                            <a href="{{ route('periode.edit', $row->periode_id) }}" class="btn btn-sm btn-warning"><span class="fa-fw select-all fas"></span></a>
                                            <form action="{{ route('periode.destroy', $row->periode_id) }}" method="POST">
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
