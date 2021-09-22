<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SuratController;

// Auth::routes(['register'=>false]);
Auth::routes();
Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::prefix('surat')->group(function () {
        Route::get('/sktm/create', [SuratController::class, 'sktm'])->name('create.surat.sktm');
        Route::post('/sktm/create', [SuratController::class, 'store']);
        Route::delete('/sktm/delete/{id}', [SuratController::class, 'delete'])->name('delete.surat.sktm');

        Route::get('/skd/create', [SuratController::class, 'skd'])->name('create.surat.skd');
        Route::post('/skd/create', [SuratController::class, 'storeskd']);
        Route::delete('/skd/delete/{id}', [SuratController::class, 'deleteskd'])->name('delete.surat.skd');

        Route::get('/skpp/create', [SuratController::class, 'skpp'])->name('create.surat.skpp');
        Route::post('/skpp/create', [SuratController::class, 'storeskpp']);
        Route::delete('/skpp/delete/{id}', [SuratController::class, 'deleteskpp'])->name('delete.surat.skpp');

        
    });
});
