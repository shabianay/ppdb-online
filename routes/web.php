<?php

use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\UserDashboardController;

// Public routes
Route::get('/', [LandingPageController::class, 'index'])->name('landing.index');
Route::get('/info-ppdb', [LandingPageController::class, 'info'])->name('landing.info');
Route::get('/jalur-pendaftaran', [LandingPageController::class, 'jalur'])->name('landing.jalur');
Route::get('/faq', [LandingPageController::class, 'faq'])->name('landing.faq');
Route::get('/kontak', [LandingPageController::class, 'kontak'])->name('landing.kontak');
Route::get('/pengumuman', [LandingPageController::class, 'pengumuman'])->name('landing.pengumuman');
Route::get('/pengumuman/{id}', [LandingPageController::class, 'pengumumanDetail'])->name('landing.pengumuman-detail');
Route::get('/unduhan/{file}', [LandingPageController::class, 'unduhan'])->name('landing.unduhan');

// Authenticated user routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', function () {
        return view('profile');
    })->name('profile');
    Route::post('/profile/update-information', [App\Http\Controllers\Auth\ProfileController::class, 'updateInformation'])->name('profile.update-information');
    Route::post('/profile/update-password', [App\Http\Controllers\Auth\ProfileController::class, 'updatePassword'])->name('profile.update-password');
    Route::post('/profile/destroy', [App\Http\Controllers\Auth\ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Pendaftaran routes
    Route::prefix('pendaftaran')->name('pendaftaran.')->group(function () {
        Route::get('/', [App\Http\Controllers\PendaftaranController::class, 'index'])->name('index');
        Route::get('/create', [App\Http\Controllers\PendaftaranController::class, 'create'])->name('create');
        Route::post('/', [App\Http\Controllers\PendaftaranController::class, 'store'])->name('store');
        Route::get('/{pendaftar}', [App\Http\Controllers\PendaftaranController::class, 'show'])->name('show');
        Route::get('/{pendaftar}/edit', [App\Http\Controllers\PendaftaranController::class, 'edit'])->name('edit');
        Route::put('/{pendaftar}', [App\Http\Controllers\PendaftaranController::class, 'update'])->name('update');
        Route::get('/{pendaftar}/pdf', [App\Http\Controllers\PendaftaranController::class, 'downloadPdf'])->name('pdf');
        Route::post('/{pendaftar}/upload-dokumen', [App\Http\Controllers\DokumenPendaftarController::class, 'upload'])->name('upload-dokumen');
        Route::post('/autosave', [App\Http\Controllers\PendaftaranAutoSaveController::class, 'store'])->name('autosave');
    });
    
    // Tagihan routes
    Route::get('/tagihan', [App\Http\Controllers\TagihanController::class, 'index'])->name('tagihan.index');
    Route::get('/tagihan/{tagihan}', [App\Http\Controllers\TagihanController::class, 'show'])->name('tagihan.show');
    Route::post('/tagihan/{tagihan}/bayar', [App\Http\Controllers\TagihanController::class, 'uploadBukti'])->name('tagihan.upload-bukti');
    Route::get('/kwitansi/{pembayaran}', [App\Http\Controllers\TagihanController::class, 'downloadReceipt'])->name('tagihan.receipt');
    
    // Notifikasi routes
    Route::get('/notifikasi', [App\Http\Controllers\NotifikasiController::class, 'index'])->name('notifikasi.index');
    Route::post('/notifikasi/{notifikasi}/baca', [App\Http\Controllers\NotifikasiController::class, 'baca'])->name('notifikasi.baca');
});

// Admin routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Audit Log
    Route::get('/audit-log', [App\Http\Controllers\Admin\AuditLogController::class, 'index'])->name('audit-log.index');
    
    // Settings
    Route::get('/pengaturan', [App\Http\Controllers\Admin\SettingController::class, 'index'])->name('settings.index');
    Route::post('/pengaturan', [App\Http\Controllers\Admin\SettingController::class, 'update'])->name('settings.update');
    
    // Manajemen Jalur
    Route::resource('jalur-pendaftaran', App\Http\Controllers\Admin\JalurPendaftaranController::class);
    
    // Manajemen Gelombang
    Route::resource('gelombang', App\Http\Controllers\Admin\GelombangController::class);
    
    // Verifikasi Pendaftar
    Route::get('/verifikasi', [App\Http\Controllers\Admin\VerifikasiController::class, 'index'])->name('verifikasi.index');
    Route::get('/verifikasi/{pendaftar}', [App\Http\Controllers\Admin\VerifikasiController::class, 'show'])->name('verifikasi.show');
    Route::post('/verifikasi/{pendaftar}/approve', [App\Http\Controllers\Admin\VerifikasiController::class, 'approve'])->name('verifikasi.approve');
    Route::post('/verifikasi/{pendaftar}/reject', [App\Http\Controllers\Admin\VerifikasiController::class, 'reject'])->name('verifikasi.reject');
    
    // Dokumen
    Route::post('/dokumen/{dokumen}/verifikasi', [App\Http\Controllers\Admin\VerifikasiController::class, 'verifikasiDokumen'])->name('dokumen.verifikasi');
    
    // Manajemen Pengumuman
    Route::resource('pengumuman', App\Http\Controllers\Admin\PengumumanController::class);
    
    // Manajemen Dokumen Persyaratan
    Route::resource('dokumen-persyaratan', App\Http\Controllers\Admin\DokumenPersyaratanController::class);

    // Manajemen User
    Route::resource('users', App\Http\Controllers\Admin\UserController::class);
    
    // Hasil Seleksi
    Route::get('/seleksi', [App\Http\Controllers\Admin\SeleksiController::class, 'index'])->name('seleksi.index');
    Route::post('/seleksi/umumkan', [App\Http\Controllers\Admin\SeleksiController::class, 'umumkan'])->name('seleksi.umumkan');
    
    // Laporan
    Route::get('/laporan/pendaftar', [App\Http\Controllers\Admin\LaporanController::class, 'pendaftar'])->name('laporan.pendaftar');
    Route::get('/laporan/keuangan', [App\Http\Controllers\Admin\LaporanController::class, 'keuangan'])->name('laporan.keuangan');
    Route::get('/laporan/export-excel', [App\Http\Controllers\Admin\LaporanController::class, 'exportExcel'])->name('laporan.export-excel');
    Route::get('/laporan/export-pdf', [App\Http\Controllers\Admin\LaporanController::class, 'exportPdf'])->name('laporan.export-pdf');
});

require __DIR__.'/auth.php';
