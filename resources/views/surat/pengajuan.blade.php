@extends('layouts.app')
@section('title', 'Pengajuan Surat')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif
                    <div class="m-1 d-flex">
                        <div class="m-1 col-md-12">
                            <div class="mt-3 text-center">
                                <h3>Sistem Informasi Pembuatan Surat <br> Desa Sanggrahan</h3>
                                <hr>
                            </div>
                            <div>
                                <div>
                                    <ul>
                                        <li>
                                            <h6 class="font-weight-bold">Pengajuan Surat Yang Tersedia</h6>
                                        </li>
                                    </ul>
                                </div>
                                <div>
                                    <div id="accordion">
                                        <div class="d-flex card ">
                                            <button
                                                class="card-header btn btn-link d-flex align-item-center justify-content-between collapse"
                                                id="headingOne" data-toggle="collapse" data-target="#collapseOne"
                                                aria-controls="collapseOne">
                                                <div class="d-flex">
                                                    <h5 class="mb-0">
                                                        <div class="d-flex align-item-center">
                                                            <div class="" data-toggle="collapse"
                                                                data-target="#collapseOne" aria-controls="collapseOne">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    style="width: 30px" fill="none" viewBox="0 0 24 24"
                                                                    stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
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
                                            <div id="collapseOne" class="collapse " aria-labelledby="headingOne"
                                                data-parent="#accordion">
                                                <div class="card-body">
                                                    Surat Keterangan Tidak Mampu (SKTM) adalah surat yang dikeluarkan
                                                    oleh pihak Desa/Kelurahan bagi Keluarga Miskin (Gakin). SKTM ini
                                                    berguna bagi Gakin untuk mendapatkan perawatan dan pengobatan gratis
                                                    di RS yang ada di di sekitar daerah anda, yang memang melayani
                                                    SKTM/Gakin.
                                                </div>
                                                <div class="d-flex card-footer justify-content-around">
                                                    @if (auth()->user()->latestsktm == null)
                                                    <a href="{{ Route('create.surat.sktm') }}"
                                                        class="btn btn-primary font-weight-bold">Buat dan Ajukan</a>
                                                    @else
                                                    @if (auth()->user()->latestsktm->status == "Ajukan")
                                                    <div class="btn btn-secondary font-weight-bold">Sedang di Ajukan
                                                    </div>
                                                    <a href="{{ Route('create.surat.sktm') }}"
                                                        class="btn btn-success font-weight-bold">Lihat Surat</a>
                                                    <form
                                                        action="{{ Route('delete.surat.sktm', auth()->user()->latestsktm->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit"
                                                            class="btn btn-danger font-weight-bold">Hapus Surat yang
                                                            diajukan</button>
                                                    </form>
                                                    @else
                                                    <a href="{{ Route('create.surat.sktm') }}"
                                                        class="btn btn-primary font-weight-bold">Buat dan Ajukan</a>
                                                    @endif
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex card">
                                            <button
                                                class="card-header btn btn-link d-flex align-item-center justify-content-between collapse"
                                                id="headingTwo" data-toggle="collapse" data-target="#collapseTwo"
                                                aria-controls="collapseOne">
                                                <div class="d-flex">
                                                    <h5 class="mb-0">
                                                        <div class="d-flex align-item-center">
                                                            <div class="" data-toggle="collapse"
                                                                data-target="#collapseOne" aria-controls="collapseOne">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    style="width: 30px" fill="none" viewBox="0 0 24 24"
                                                                    stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
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
                                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                                data-parent="#accordion">
                                                <div class="card-body">
                                                    Surat Keterangan Domisili (SKD) adalah surat keterangan yang
                                                    dikeluarkan oleh pejabat berwenang untuk menyatakan domisili
                                                    seseorang. SKD diperuntukkan bagi seseorang yang tinggal di Nganjuk,
                                                    tetapi memiliki KTP ataupun identitas kependudukan dari wilayah lain
                                                    di luar wilayah administrasi Nganjuk.
                                                </div>
                                                <div class="d-flex card-footer justify-content-around">
                                                    @if (auth()->user()->latestskd == null)
                                                    <a href="{{ Route('create.surat.skd') }}"
                                                        class="btn btn-primary font-weight-bold">Buat dan Ajukan</a>
                                                    @else
                                                    @if (auth()->user()->latestskd->status == "Ajukan")
                                                    <div class="btn btn-secondary font-weight-bold">Sedang di Ajukan
                                                    </div>
                                                    <a href="{{ Route('create.surat.skd') }}"
                                                        class="btn btn-success font-weight-bold">Lihat Surat</a>
                                                    <form
                                                        action="{{ Route('delete.surat.skd', auth()->user()->latestskd->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit"
                                                            class="btn btn-danger font-weight-bold">Hapus Surat yang
                                                            diajukan</button>
                                                    </form>
                                                    @else
                                                    <a href="{{ Route('create.surat.skd') }}"
                                                        class="btn btn-primary font-weight-bold">Buat dan Ajukan</a>
                                                    @endif
                                                    @endif


                                                </div>

                                            </div>
                                        </div>
                                        <div class="d-flex card ">
                                            <button
                                                class="card-header btn btn-link d-flex align-item-center justify-content-between collapse"
                                                id="headingOne" data-toggle="collapse" data-target="#collapseThree"
                                                aria-controls="collapseThree">
                                                <div class="d-flex">
                                                    <h5 class="mb-0">
                                                        <div class="d-flex align-item-center">
                                                            <div class="" data-toggle="collapse"
                                                                data-target="#collapseOne" aria-controls="collapseOne">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    style="width: 30px" fill="none" viewBox="0 0 24 24"
                                                                    stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
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


                                            <div id="collapseThree" class="collapse " aria-labelledby="headingThree"
                                                data-parent="#accordion">
                                                <div class="card-body">
                                                    Surat Keterangan Penduduk Pindah dan Datang adalah Surat Keterangan
                                                    yang dikeluarkan oleh Instansi Pelaksana Dinas Kependudukan dan
                                                    Pencatatan Sipil untuk Warga Negara Indonesia yang melaporkan
                                                    Kedatangannya guna masuk menjadi Penduduk.
                                                </div>
                                                <div class="d-flex card-footer justify-content-around">
                                                    @if (auth()->user()->latestskpp == null)
                                                    <a href="{{ Route('create.surat.skpp') }}"
                                                        class="btn btn-primary font-weight-bold">Buat dan Ajukan</a>
                                                    @else
                                                    @if (auth()->user()->latestskpp->status == "Ajukan")
                                                    <div class="btn btn-secondary font-weight-bold">Sedang di Ajukan
                                                    </div>
                                                    <a href="{{ Route('create.surat.skpp') }}"
                                                        class="btn btn-success font-weight-bold">Lihat Surat</a>
                                                    <form
                                                        action="{{ Route('delete.surat.skpp', auth()->user()->latestskpp->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit"
                                                            class="btn btn-danger font-weight-bold">Hapus Surat yang
                                                            diajukan</button>
                                                    </form>
                                                    @else
                                                    <a href="{{ Route('create.surat.skpp') }}"
                                                        class="btn btn-primary font-weight-bold">Buat dan Ajukan</a>
                                                    @endif
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection