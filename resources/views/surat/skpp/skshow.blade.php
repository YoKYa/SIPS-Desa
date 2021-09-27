@extends('layouts.app')
@section('title', "Surat Keluar - Surat Keterangan Pindah Penduduk")
@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <form class="w-100 me-3" method="POST" action="{{ Route('surat.keluar.skpp') }}">
                @csrf
                <input type="search" name="search" class="form-control" placeholder="Search..." aria-label="Search">
                <small>Enter untuk mencari</small>
            </form> 
        </div>
        <div class="card-body">
            <h4 class="card-title">Surat Keterangan Pindah Penduduk</h4>
            <h6 class="card-subtitle">Daftar Surat-surat Keluar</h6>
        </div>
        <div class="table-responsive">
            <table class="table">
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
                    @if ($skpp->count() == 0)
                    <tr>
                        <td>

                            <div>Maaf Data Tidak Ada</div>

                        </td>
                    </tr>
                    @endif
                    @foreach ($skpp as $item)
                    <tr>
                        <th scope="row">{{ $item->user->name }}</th>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->nik }}</td>
                        <td>{{ $item->status }}</td>
                        <td class="d-flex">
                            <a class="mx-2" href="{{ Route('skpp.show', $item->id) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection