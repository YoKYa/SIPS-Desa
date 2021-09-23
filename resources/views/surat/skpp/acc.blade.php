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
                        <div class="m-1 rounded shadow-sm col-md-9">
                            <div class="mt-3 ">
                                <h3>Surat Keterangan Pindah Penduduk</h3>
                                <hr>
                            </div>
                            <div>
                                <h5>Pembuat : {{ $data->user->name }}</h5>
                                <h5>NIK : {{ $data->user->username }}</h5>
                                <hr>
                                <div class="d-flex flex-column">
                                    <div class="">
                                        <a href=""><b>Download / Cetak Surat</b></a>
                                    </div>
                                    <hr>
                                    <div>
                                        <form method="post" enctype="multipart/form-data" action="{{ Route('skpp.acc', $data->id) }}">
                                            @csrf
                                            <div class="form-group">
                                                <input type="file" class="form-control" name="file">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Upload</button>
                                            <br>
                                            <small>Setelah Upload, Pengajuan secara otomatis telah disetujui</small>
                                        </form>
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