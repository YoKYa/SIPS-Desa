@extends('layouts.app')
@section('title', 'Data APBD')
@section('content')
<nav class=" my-3 p-3 navbar navbar-light bg-light">
    <a class="navbar-brand">APBD @if (isset($tahun)) {{ $tahun }} @endif</a>
    <form class="form-inline d-flex" method="post">
        @csrf
        <select name="tahun" id="tahun" class="form-control mr-sm-2">
            <option disabled selected>Pilih Tahun APBD yang dicari</option>
            @for ($i = 2000; $i < 2100; $i++) @if (isset($tahun)) <option value="{{ $i }}" @if ($i==$tahun) selected
                @endif>{{ $i }}</option>
                @else
                <option value="{{ $i }}">{{ $i }}</option>
                @endif
                @endfor
        </select>
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tampilkan</button>
    </form>
</nav>
@if (auth()->user()->status == 'Admin')
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <form class="form-horizontal form-material mx-2" action="{{ Route('tambahapbd') }}" method="post">
                @csrf
                <h3>Tambah Data</h3>
                <div class="form-group">
                    <label for="kode1" class="col-md-12">Kode Rekening 1</label>
                    <div class="col-md-12">
                        <input type="text" placeholder="Kode Rekening 1" class="form-control form-control-line"
                            name="kode_rekening_1" required>
                    </div>
                    @error('kode_rekening_1')
                    <div class="alert alert-warning" role="alert">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="kode2" class="col-md-12">Kode Rekening 2</label>
                    <div class="col-md-12">
                        <input type="text" placeholder="Kode Rekening 2" class="form-control form-control-line"
                            name="kode_rekening_2" required>
                    </div>
                    @error('kode_rekening_2')
                    <div class="alert alert-warning" role="alert">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="uraian" class="col-md-12">Uraian</label>
                    <div class="col-md-12">
                        <textarea class="form-control form-control-line" name="uraian" required></textarea>
                    </div>
                    @error('uraian')
                    <div class="alert alert-warning" role="alert">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="anggaran" class="col-md-12">Anggaran</label>
                    <div class="col-md-12">
                        <input type="number" placeholder="Anggaran" class="form-control form-control-line"
                            name="anggaran" required>
                    </div>
                    @error('anggaran')
                    <div class="alert alert-warning" role="alert">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="sumber" class="col-md-12">Sumber Dana</label>
                    <div class="col-md-12">
                        <input type="text" placeholder="Sumber Dana" class="form-control form-control-line"
                            name="sumber" required>
                    </div>
                    @error('sumber')
                    <div class="alert alert-warning" role="alert">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tahun" class="col-md-12">Tahun</label>
                    <div class="col-md-12">
                        <input type="number" placeholder="Tahun" class="form-control form-control-line" name="tahun"
                            required>
                    </div>
                    @error('tahun')
                    <div class="alert alert-warning" role="alert">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="Jenis" class="col-sm-12">Jenis</label>
                    <div class="col-sm-12">
                        <select name="jenis" id="Jenis" class="form-select shadow-none form-control-line" required>
                            <option disabled selected>Pilih Jenis</option>
                            <option value="Pendapatan">Pendapatan</option>
                            <option value="Belanja">Belanja</option>
                        </select>
                    </div>

                    @error('jenis')
                    <div class="alert alert-warning" role="alert">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <button class="btn btn-success text-white">Tambah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@if (!isset($tahun))
<h4 class="m-3">Anda Belum Memilih Tahun</h4>
@else
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Pendapatan</h4>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Kode Rekening 1</th>
                        <th scope="col">Kode Rekening 2</th>
                        <th scope="col">Uraian</th>
                        <th scope="col">Anggaran</th>
                        <th scope="col">Sumber Dana</th>
                        @if (auth()->user()->status == 'Admin')<th scope="col">Action</th>@endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pendapatan as $item)
                    <tr>
                        <th scope="row">{{ $item->kode_rekening_1 }}</th>
                        <th scope="row">{{ $item->kode_rekening_2 }}</th>
                        <td>{{ $item->uraian }}</td>
                        <td>{{ $item->anggaran }}</td>
                        <td>{{ $item->sumber }}</td>
                        @if (auth()->user()->status == 'Admin')<td scope="col">
                            <form action="{{ Route('apbd.del') }}" method="post">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="apbddel" value="{{ $item->id }}">
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>@endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Belanja</h4>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Kode Rekening 1</th>
                        <th scope="col">Kode Rekening 2</th>
                        <th scope="col">Uraian</th>
                        <th scope="col">Anggaran</th>
                        <th scope="col">Sumber Dana</th>
                        @if (auth()->user()->status == 'Admin')<th scope="col">Action</th>@endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($belanja as $item)
                    <tr>
                        <th scope="row">{{ $item->kode_rekening_1 }}</th>
                        <th scope="row">{{ $item->kode_rekening_2 }}</th>
                        <td>{{ $item->uraian }}</td>
                        <td>{{ $item->anggaran }}</td>
                        <td>{{ $item->sumber }}</td>
                        @if (auth()->user()->status == 'Admin')<td scope="col">
                            <form action="{{ Route('apbd.del') }}" method="post">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="apbddel" value="{{ $item->id }}">
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>@endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif
@endsection