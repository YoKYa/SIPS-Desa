@extends('layouts.app')
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
            <div>
                <div class="d-flex flex-column">
                    <div class="row">
                        <div class="col-4">Nama </div>
                        <div class="text-right col-1">:</div>
                        <div class="text-left col-7">{{ $data->name }}</div>
                    </div>
                    <div class="row">
                        <div class="col-4">NIK </div>
                        <div class="text-right col-1">:</div>
                        <div class="text-left col-7">{{ $data->nik }}</div>
                    </div>
                    <div class="row">
                        <div class="col-4">Jenis Kelamin </div>
                        <div class="text-right col-1">:</div>
                        <div class="text-left col-7">@if ($data->jk == 0)
                            Laki-Laki @else Perempuan
                        @endif</div>
                    </div>
                    <div class="row">
                        <div class="col-4">Tempat/Tanggal Lahir </div>
                        <div class="text-right col-1">:</div>
                        <div class="text-left col-7">{{ $data->tempatlahir }}/{{ date('d-m-Y', strtotime($data->tanggallahir)) }}</div>
                    </div>
                    <div class="row">
                        <div class="col-4">Kewarganegaraan </div>
                        <div class="text-right col-1">:</div>
                        <div class="text-left col-7">{{ $data->kewarganegaraan }}</div>
                    </div>
                    <div class="row">
                        <div class="col-4">Agama </div>
                        <div class="text-right col-1">:</div>
                        <div class="text-left col-7">{{ $data->agama }}</div>
                    </div>
                    <div class="row">
                        <div class="col-4">Pekerjaan </div>
                        <div class="text-right col-1">:</div>
                        <div class="text-left col-7">{{ $data->pekerjaan }}</div>
                    </div>
                    <div class="row">
                        <div class="col-4">Alamat </div>
                        <div class="text-right col-1">:</div>
                        <div class="text-left col-7">{{ $data->alamat }}</div>
                    </div>
                    <div class="row">
                        <div class="col-4">Alasan Mengajukan Surat (Keterangan) </div>
                        <div class="text-right col-1">:</div>
                        <div class="text-left col-7">{{ $data->keterangan }}</div>
                    </div>
                    @if ($data->status == "Diterima")
                    <div class="row">
                        <div class="col-4">File Download PDF </div>
                        <div class="text-right col-1">:</div>
                        <a href="{{ asset('storage/'.$data->file) }}" target="_blank"
                            class="text-left col-7"><b>PDF</b></a>
                    </div>
                    @endif
                </div>
                <hr>
                @if ($data->status == 'Diterima' || $data->status == 'Ditolak')
                @else
                <div class="mb-3 d-flex justify-content-between">
                    <a href="{{ Route('skd.acc',$data->id) }}" class="btn btn-primary">Terima Pengajuan</a>
                    <form action="{{ Route('skd.nacc', $data->id) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger p-2 text-white">
                            Tolak Pengajuan
                        </button>
                    </form>
                </div>    
                @endif
            </div>
        </div>
    </div>
</div>
<a href="{{ URL::previous() }}" class="mdi mdi-backburger"><b>KEMBALI</b></a>
@endsection