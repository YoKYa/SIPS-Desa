@extends('layouts.app')
@section('title', 'Surat Pemesanan')
@section('content')
<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Surat Keterangan Tidak Mampu</h4>
            </div>
            <div class="d-flex align-items-center justify-content-center flex-row">
                <div class="display-1 m-0 p-0"><i class="mdi mdi-email-variant"></i>
                    </div>
            </div>
            <div class="comment-widgets scrollable">
                {{-- Row --}}
                <a href="{{ Route('surat.sktm') }}" class="d-flex flex-row comment-row m-t-0">
                    <div class="comment-text h-25">
                        <span>
                        <h4 class="mdi mdi-email-open text-lg">
                           &nbsp; &nbsp;&nbsp;Buka Pemesanan
                        </h4>
                        <span>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Surat Keterangan Domisili</h4>
            </div>
            <div class="d-flex align-items-center justify-content-center flex-row">
                <div class="display-1 m-0 p-0"><i class="mdi mdi-email-variant"></i>
                    </div>
            </div>
            <div class="comment-widgets scrollable">
                {{-- Row --}}
                <a href="{{ Route('surat.skd') }}" class="d-flex flex-row comment-row m-t-0">
                    <div class="comment-text h-25">
                        <span>
                        <h4 class="mdi mdi-email-open text-lg">
                           &nbsp; &nbsp;&nbsp;Buka Pemesanan
                        </h4>
                        <span>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Surat Keterangan Pindah Penduduk</h4>
            </div>
            <div class="d-flex align-items-center justify-content-center flex-row">
                <div class="display-1 m-0 p-0"><i class="mdi mdi-email-variant"></i>
                    </div>
            </div>
            <div class="comment-widgets scrollable">
                {{-- Row --}}
                <a href="{{ Route('surat.skpp') }}" class="d-flex flex-row comment-row m-t-0">
                    <div class="comment-text h-25">
                        <span>
                        <h4 class="mdi mdi-email-open text-lg">
                           &nbsp; &nbsp;&nbsp;Buka Pemesanan
                        </h4>
                        <span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection