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
                                <h3>Surat Keterangan Tidak Mampu</h3>
                                <hr>
                            </div>
                            <div>
                                <h5>Pembuat : {{ $data->user->name }}</h5>
                                <h5>NIK : {{ $data->user->username }}</h5>
                                <hr>
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
                                        <div class="text-left col-7">
                                            {{ $data->tempatlahir }}/{{ date('d-m-Y', strtotime($data->tanggallahir)) }}
                                        </div>
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
                                        <div class="col-4">Status Menikah </div>
                                        <div class="text-right col-1">:</div>
                                        <div class="text-left col-7">{{ $data->statuspernikahan }}</div>
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
                                    <a href="{{ Route('sktm.acc',$data->id) }}" class="btn btn-primary">Terima
                                        Pengajuan</a>
                                    <form action="{{ Route('sktm.nacc', $data->id) }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-danger p-2">
                                            Tolak Pengajuan
                                        </button>
                                    </form>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection