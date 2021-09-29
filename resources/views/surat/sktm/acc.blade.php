@extends('layouts.app')
@section('title', 'Terima Pengajuan SKTM')
@section('content')
<div class="card">
    <div class="card-body">
        <center class="m-t-30"> 
            <h4 class="card-title m-t-10">Pembuat</h4>
            <h4 class="card-subtitle">{{ $data->user->name }}</h4>
            <div class="row text-center justify-content-md-center">
                <div class="col-12"><a href="javascript:void(0)" class="link"><i class="icon-people"></i>
                        <font class="font-medium">{{ $data->user->username }}</font>
                    </a>
                </div>
            </div>
        </center>
    </div>
        <hr>
    <div class="card-body"> 
        <div class="d-flex flex-column">
            <div class="">
                <a href="{{ Route('cetak.sktm', $data->id) }}" target="_blank"><b>Download / Cetak Surat</b></a>
            </div>
            <hr>
            <div>
                <form method="post" enctype="multipart/form-data" action="{{ Route('sktm.acc', $data->id) }}">
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
<a href="{{ URL::previous() }}" class="mdi mdi-backburger"><b>KEMBALI</b></a>
@endsection