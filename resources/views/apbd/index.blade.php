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
                        <div class="m-1 rounded shadow-sm d-flex flex-column col">
                            <nav class=" my-3 navbar navbar-light bg-light">
                                <a class="navbar-brand">APBD</a>
                                <form class="form-inline" method="post">
                                    @csrf
                                    <select name="tahun" id="tahun" class="form-control mr-sm-2">
                                        <option disabled selected>Pilih Tahun APBD yang dicari</option>
                                        @for ($i = 2000; $i < 2100; $i++) @if (isset($tahun)) <option value="{{ $i }}"
                                            @if ($i==$tahun) selected @endif>{{ $i }}</option>
                                            @else
                                            <option value="{{ $i }}">{{ $i }}</option>
                                            @endif
                                            @endfor
                                    </select>
                                    <button class="btn btn-outline-success my-2 my-sm-0"
                                        type="submit">Tampilkan</button>
                                </form>
                            </nav>
                            @if (auth()->user()->status == 'Admin')
                            <div class="my-3 hr">
                                <h4>Tambah Data </h4>
                                <form action="{{ Route('tambahapbd') }}" method="post">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="kode1" class="col-sm-2 col-form-label">Kode Rekening 1</label>
                                        <input type="text" placeholder="Kode Rekening 1" class="form-control col-sm-9"
                                            name="kode_rekening_1" required>
                                        @error('kode_rekening_1')
                                        <div class="alert alert-warning" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <label for="kode2" class="col-sm-2 col-form-label">Kode Rekening 2</label>
                                        <input type="text" placeholder="Kode Rekening 2" class="form-control col-sm-9"
                                            name="kode_rekening_2" required>
                                        @error('kode_rekening_2')
                                        <div class="alert alert-warning" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <label for="uraian" class="col-sm-2 col-form-label">Uraian</label>
                                        <textarea class="form-control col-sm-9" name="uraian" required></textarea>
                                        @error('uraian')
                                        <div class="alert alert-warning" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <label for="anggaran" class="col-sm-2 col-form-label">Anggaran</label>
                                        <input type="number" placeholder="Anggaran" class="form-control col-sm-9"
                                            name="anggaran" required>
                                        @error('anggaran')
                                        <div class="alert alert-warning" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <label for="sumber" class="col-sm-2 col-form-label">Sumber Dana</label>
                                        <input type="text" placeholder="Sumber Dana" class="form-control col-sm-9"
                                            name="sumber" required>
                                        @error('sumber')
                                        <div class="alert alert-warning" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <label for="tahun" class="col-sm-2 col-form-label">Tahun</label>
                                        <input type="number" placeholder="Tahun" class="form-control col-sm-9"
                                            name="tahun" required>
                                        @error('tahun')
                                        <div class="alert alert-warning" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <label for="Jenis" class="col-sm-2 col-form-label">Jenis</label>
                                        <select name="jenis" id="" class="form-control col-sm-9" required>
                                            <option disabled selected>Pilih Jenis</option>
                                            <option value="Pendapatan">Pendapatan</option>
                                            <option value="Belanja">Belanja</option>
                                        </select>
                                        @error('jenis')
                                        <div class="alert alert-warning" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary mb-4">Simpan</button>
                                </form>
                                <hr>
                            </div>
                            @endif
                            @if (!isset($tahun))
                            <h4 class="m-3">Anda Belum Memilih Tahun</h4>
                            @else
                            <h3 class="m-3">APBD Tahun {{ $tahun }}</h3>
                            <h5 class="m-1"><b>Pendapatan</b></h5>
                            <div class="table-responsive">
                                <table class="table table-sm">
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
                            <h5 class="mt-4"><b>Belanja</b></h5>
                            <div class="table-responsive">
                                <table class="table table-sm">
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
                                            <td>Rp.{{ number_format($item->anggaran,2,',','.') }}</td>
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
                            @endif

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection