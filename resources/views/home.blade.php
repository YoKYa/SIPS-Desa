@extends('layouts.app')
@section('title','Dashboard')
@section('content')
<div class="row">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-center">
                <div class="col-12 w-100">
                    <div id="carouselExampleIndicators" class="carousel slide " data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner" style="height: 500px">
                            <div class="carousel-item active ">
                                <img class="d-block w-100 " src="{{ asset('images/desa/1.jpg') }}" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('images/desa/2.jpg') }}" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('images/desa/3.jpg') }}" alt="Third slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
            <hr>
            <div class="d-flex ">
                <h2 class="text-center w-100 my-4">Alur Pembuatan Surat</h2>
            </div>
            <div class="row">
                <ol>
                    <li class="fs-4 text-dark">
                        Login/Masuk menggunakan akun yang disediakan
                    </li>
                    <li class="fs-4 text-dark">
                        Jika belum terdaftar maka silahkan mengisi formulir pada halaman Register
                    </li>
                    <li class="fs-4 text-dark">
                        Pilih menu Pengajuan Surat
                    </li>
                    <li class="fs-4 text-dark">
                        Lalu pilih surat yang akan dibuat
                    </li>
                    <li class="fs-4 text-dark">
                        Isi formulir berdasarkan data diri Anda
                    </li>
                    <li class="fs-4 text-dark">
                        Tekan tombol submit untuk mengirim data diri
                    </li>
                    <li class="fs-4 text-dark">
                        Untuk mengecek apakah sudah terkirim silahkan buka halaman Pengajuan Surat dan pilih suratnya
                    </li>
                    <li class="fs-4 text-dark">
                        Anda bisa mengecek secara langsung surat sedang diproses dan melihat surat yang belum di terima
                    </li>
                    <li class="fs-4 text-dark">
                        Tunggu Surat masuk dari pihak desa dengan mengecek halaman Surat Masuk
                    </li>
                    <li class="fs-4 text-dark">
                        Ketika surat telah dikirim, akan masuk dalam riwayat surat, sebagai bukti telah terkirim
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection