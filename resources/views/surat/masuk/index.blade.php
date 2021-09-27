@extends('layouts.app')
@section('title', 'Surat Masuk')
@section('content')
<div class="row">
    <div class="card">
    <div class="card-body">
        <h4>Surat Keterangan Tidak Mampu</h4>
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
                @if ($sktm->count() == 0)
                <tr>
                    <th>
                        Tidak Ada Surat Masuk
                    </th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                @endif
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
    
    <div class="card-body">
        <h4>Surat Keterangan Domisili</h4>
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
                @if ($skd->count() == 0)
                <tr>
                    <th>
                        Tidak Ada Surat Masuk
                    </th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                @endif
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
    <div class="card-body">
    <h4>Surat Keterangan Pindah penduduk</h4>
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
                @if ($skpp->count() == 0)
                <tr>
                    <th>
                        Tidak Ada Surat Masuk
                    </th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                @endif
                @foreach ($skpp as $item)
                <tr>
                    <th scope="row">{{ $item->user->name }}</th>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->nik }}</td>
                    <td>{{ $item->status }}</td>
                    <td class="d-flex">
                        <a class="mx-2"
                            href="{{ asset('storage/'.$item->file) }}">
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
@endsection