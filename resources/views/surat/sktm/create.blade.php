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
                            <div class="mt-3 text-center">
                                <h3>Sistem Informasi Pembuatan Surat <br> Desa Sanggrahan</h3>
                                <hr>
                            </div>
                            <div class="m-3">
                                <h3>Surat Keterangan Tidak Mampu (SKTM)</h3>
                                <form method="post" action="{{ Route('create.surat.sktm') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="Nama">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="Nama" placeholder="Nama Lengkap"
                                            name="name" required>
                                        @error('name')
                                        <div class="alert alert-warning" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="NIK">NIK</label>
                                        <input type="number" class="form-control" id="NIK" placeholder="NIK" name="nik"
                                            required>
                                        @error('nik')
                                        <div class="alert alert-warning" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="Jenis Kelamin">Jenis Kelamin</label>
                                        <select name="jk" id="jk" class="form-control" required>
                                            <option value="" disabled selected>Pilih</option>
                                            <option value="0">Laki-Laki</option>
                                            <option value="1">Perempuan</option>
                                        </select>
                                        @error('jk')
                                        <div class="alert alert-warning" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="TempatLahir">Tempat Lahir</label>
                                        <input type="text" required class="form-control" id="TempatLahir"
                                            placeholder="Tempat Lahir" name="tempatlahir">
                                        @error('tempatlahir')
                                        <div class="alert alert-warning" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="TanggalLahir">Tanggal Lahir</label>
                                        <input type="date" required class="form-control" id="TanggalLahir"
                                            placeholder="Tanggal Lahir" name="tanggallahir">
                                        @error('tanggallahir')
                                        <div class="alert alert-warning" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="kewarganegaraan">Kewarganegaraan</label>
                                        <input type="text" required class="form-control" id="kewarganegaraan"
                                            placeholder="kewarganegaraan" name="kewarganegaraan">
                                        @error('kewarganegaraan')
                                        <div class="alert alert-warning" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="agama">Agama</label>
                                        <input type="text" required class="form-control" id="agama" placeholder="Agama"
                                            name="agama">
                                        @error('agama')
                                        <div class="alert alert-warning" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="pekerjaan">Pekerjaan</label>
                                        <input type="text" required class="form-control" id="pekerjaan"
                                            placeholder="Pekerjaan" name="pekerjaan">
                                        @error('pekerjaan')
                                        <div class="alert alert-warning" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="statuspernikahan">Status Pernikahan</label>
                                        <select name="statuspernikahan" required id="statuspernikahan" class="form-control">
                                            <option value="" disabled selected>Pilih</option>
                                            <option value="Menikah">Menikah</option>
                                            <option value="Belum Menikah">Belum Menikah</option>
                                        </select>
                                        @error('statuspernikahan')
                                        <div class="alert alert-warning" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <textarea name="alamat" required id="alamat" class="form-control"></textarea>
                                        @error('alamat')
                                        <div class="alert alert-warning" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="keterangan">Keterangan</label>
                                        <textarea name="keterangan" required id="keterangan"
                                            class="form-control"></textarea>
                                        <small class="text-secondary">*Keterangan alasan mengajukan surat</small>
                                        @error('keterangan')
                                        <div class="alert alert-warning" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="m-2 d-flex">
                                        <button type="submit" class="m-2 btn btn-primary">Submit</button>
                                        <a href="{{ Route('home') }}" class="m-2 btn btn-danger">Kembali</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection