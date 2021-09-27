@extends('layouts.app')
@section('title', "Surat Keterangan Pindah Penduduk")
@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Surat Keterangan Pindah Penduduk</h4>
            <h6 class="card-subtitle">Daftar Surat-surat yang dipesan</h6>
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

                            <a href="{{ Route('skpp.acc', $item->id) }}" class="mx-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                            </a>
                            <form action="{{ Route('skpp.nacc', $item->id) }}" method="post">
                                @csrf
                                <button type="submit" class="btn text-danger p-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection