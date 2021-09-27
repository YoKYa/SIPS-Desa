@extends('layouts.app')
@section('title', 'Riwayat Surat')
@section('content')
<div class="col-12">
    <div id="accordion">
        <div class="d-flex card ">
            <button class="card-header btn btn-link d-flex align-item-center justify-content-between collapse"
                id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-controls="collapseOne">
                <div class="d-flex">
                    <h5 class="mb-0">
                        <div class="d-flex align-item-center">
                            <div class="" data-toggle="collapse" data-target="#collapseOne" aria-controls="collapseOne">
                                <svg xmlns="http://www.w3.org/2000/svg" style="width: 30px" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>

                            </div>
                        </div>
                    </h5>
                    <div class="mt-1 ml-2 h5">
                        || Surat Keterangan Tidak Mampu
                    </div>
                </div>
                <div>
                    Info
                </div>
            </button>
            <div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Pembuat</th>
                                <th scope="col">Nama</th>
                                <th scope="col">NIK</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sktm as $item)
                            <tr>
                                <th scope="row">{{ $item->user->name }}</th>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->nik }}</td>
                                <td>{{ $item->status }}</td>
                                <td class="d-flex">
                                    <a class="mx-2" href="{{ asset('storage/'.$item->file) }}">
                                        Cetak PDF
                                    </a>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="d-flex card">
            <button class="card-header btn btn-link d-flex align-item-center justify-content-between collapse"
                id="headingTwo" data-toggle="collapse" data-target="#collapseTwo" aria-controls="collapseOne">
                <div class="d-flex">
                    <h5 class="mb-0">
                        <div class="d-flex align-item-center">
                            <div class="" data-toggle="collapse" data-target="#collapseOne" aria-controls="collapseOne">
                                <svg xmlns="http://www.w3.org/2000/svg" style="width: 30px" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>

                            </div>
                        </div>
                    </h5>
                    <div class="mt-1 ml-2 h5">
                        || Surat Keterangan Domisili
                    </div>
                </div>
                <div>
                    Info
                </div>
            </button>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Pembuat</th>
                                <th scope="col">Nama</th>
                                <th scope="col">NIK</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($skd as $item)
                            <tr>
                                <th scope="row">{{ $item->user->name }}</th>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->nik }}</td>
                                <td>{{ $item->status }}</td>
                                <td class="d-flex">
                                    <a class="mx-2" href="{{ asset('storage/'.$item->file) }}">
                                        Cetak PDF
                                    </a>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <div class="d-flex card ">
            <button class="card-header btn btn-link d-flex align-item-center justify-content-between collapse"
                id="headingOne" data-toggle="collapse" data-target="#collapseThree" aria-controls="collapseThree">
                <div class="d-flex">
                    <h5 class="mb-0">
                        <div class="d-flex align-item-center">
                            <div class="" data-toggle="collapse" data-target="#collapseOne" aria-controls="collapseOne">
                                <svg xmlns="http://www.w3.org/2000/svg" style="width: 30px" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>

                            </div>
                        </div>
                    </h5>
                    <div class="mt-1 ml-2 h5">
                        || Surat Keterangan Pindah
                    </div>
                </div>
                <div>
                    Info
                </div>
            </button>


            <div id="collapseThree" class="collapse " aria-labelledby="headingThree" data-parent="#accordion">
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Pembuat</th>
                                <th scope="col">Nama</th>
                                <th scope="col">NIK</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($skpp as $item)
                            <tr>
                                <th scope="row">{{ $item->user->name }}</th>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->nik }}</td>
                                <td>{{ $item->status }}</td>
                                <td class="d-flex">
                                    <a class="mx-2" href="{{ asset('storage/'.$item->file) }}">
                                        Cetak PDF
                                    </a>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection