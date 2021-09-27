<?php

use App\Http\Controllers\APBDController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SuratController;

// Auth::routes(['register'=>false]);
Auth::routes();
Route::middleware(['auth'])->group(function () {
    // Home
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Surat
    Route::prefix('surat')->group(function () {
        Route::get('masuk', [SuratController::class, 'suratmasuk'])->name('surat.masuk');
        Route::get('riwayat', [SuratController::class, 'riwayatsurat'])->name('riwayat.surat');
        Route::get('pengajuan',[SuratController::class, 'pengajuan'])->name('surat.pengajuan');
        // SKTM
        Route::get('/sktm/create', [SuratController::class, 'sktm'])->name('create.surat.sktm');
        Route::post('/sktm/create', [SuratController::class, 'store']);
        Route::delete('/sktm/delete/{id}', [SuratController::class, 'delete'])->name('delete.surat.sktm');
        // SKD
        Route::get('/skd/create', [SuratController::class, 'skd'])->name('create.surat.skd');
        Route::post('/skd/create', [SuratController::class, 'storeskd']);
        Route::delete('/skd/delete/{id}', [SuratController::class, 'deleteskd'])->name('delete.surat.skd');
        // SKPP
        Route::get('/skpp/create', [SuratController::class, 'skpp'])->name('create.surat.skpp');
        Route::post('/skpp/create', [SuratController::class, 'storeskpp']);
        Route::delete('/skpp/delete/{id}', [SuratController::class, 'deleteskpp'])->name('delete.surat.skpp');

        // Admin Surat
        Route::get('/', [SuratController::class, 'index'])->name('surat');
        Route::get('/sktm', [SuratController::class, 'showsktm'])->name('surat.sktm');
        Route::get('/skd', [SuratController::class, 'showskd'])->name('surat.skd');
        Route::get('/skpp', [SuratController::class, 'showskpp'])->name('surat.skpp');

        Route::get('/sk', [SuratController::class, 'indexk'])->name('surat.keluar');
        Route::get('/sk/sktm', [SuratController::class, 'skshowsktm'])->name('surat.keluar.sktm');
        Route::post('/sk/sktm', [SuratController::class, 'skshowsktmsearch']);
        Route::get('/sk/skd', [SuratController::class, 'skshowskd'])->name('surat.keluar.skd');
        Route::post('/sk/skd', [SuratController::class, 'skshowskdsearch']);
        Route::get('/sk/skpp', [SuratController::class, 'skshowskpp'])->name('surat.keluar.skpp');
        Route::post('/sk/skpp', [SuratController::class, 'skshowskppsearch']);

        // Accept Surat
        // SKTM
        Route::get('/sktm/show/{id}', [SuratController::class, 'sktmshow'])->name('sktm.show');
        Route::get('/sktm/show/{id}/acc', [SuratController::class, 'sktmacc'])->name('sktm.acc');
        Route::post('/sktm/show/{id}/acc', [SuratController::class, 'storesktmacc']);
        Route::post('/sktm/show/{id}/nacc', [SuratController::class, 'storesktmnacc'])->name('sktm.nacc');
        // SKD
        Route::get('/skd/show/{id}', [SuratController::class, 'skdshow'])->name('skd.show');
        Route::get('/skd/show/{id}/acc', [SuratController::class, 'skdacc'])->name('skd.acc');
        Route::post('/skd/show/{id}/acc', [SuratController::class, 'storeskdacc']);
        Route::post('/skd/show/{id}/nacc', [SuratController::class, 'storeskdnacc'])->name('skd.nacc');
        // SKPP
        Route::get('/skpp/show/{id}', [SuratController::class, 'skppshow'])->name('skpp.show');
        Route::get('/skpp/show/{id}/acc', [SuratController::class, 'skppacc'])->name('skpp.acc');
        Route::post('/skpp/show/{id}/acc', [SuratController::class, 'storeskppacc']);
        Route::post('/skpp/show/{id}/nacc', [SuratController::class, 'storeskppnacc'])->name('skpp.nacc');
    });
    // APBD
    Route::prefix('apbd')->group(function()
    {
        Route::get('/', [APBDController::class, 'index'])->name('apbd');
        Route::post('/', [APBDController::class, 'apbd']);
        Route::post('/add', [APBDController::class, 'add'])->name('tambahapbd');
        Route::delete('/del', [APBDController::class, 'delete'])->name('apbd.del');
    });
});
