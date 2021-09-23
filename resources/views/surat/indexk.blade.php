@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="shadow card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="m-1 d-flex">
                        @include('layouts.sidebar')
                        <div class="m-1 rounded shadow-sm d-flex flex-column col">
                            <div class="m-3 rounded shadow card mw-100">
                                <div class="mt-1 card-body d-flex flex-column">
                                    <h2 class="card-title">SKTM</h2>
                                    <h6 class="mb-2 card-subtitle text-muted">Surat Keterangan Tidak Mampu</h6>
                                    <div class="d-flex">
                                        <a href="{{ Route('surat.keluar.sktm') }}" class="card-link btn btn-primary">Lihat</a>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="m-3 rounded shadow card mw-100">
                                <div class="mt-1 card-body d-flex flex-column">
                                    <h2 class="card-title">SKD</h2>
                                    <h6 class="mb-2 card-subtitle text-muted">Surat Keterangan Domisili</h6>
                                    <div class="d-flex">
                                        <a href="{{ Route('surat.keluar.skd') }}" class="card-link btn btn-primary">Lihat</a>
                                    </div>
                                </div>
                            </div>
                            <div class="m-3 rounded shadow card mw-100">
                                <div class="mt-1 card-body d-flex flex-column">
                                    <h2 class="card-title">SKPP</h2>
                                    <h6 class="mb-2 card-subtitle text-muted">Surat Keterangan Pindah Penduduk</h6>
                                    <div class="d-flex">
                                        <a href="{{ Route('surat.keluar.skpp') }}" class="card-link btn btn-primary">Lihat</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection