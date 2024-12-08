<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ImagesCarouselController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ImagesCarouselController::class, 'home'])->name('index');

Route::get('/profile', [ImagesCarouselController::class, 'profileYayasan'])->name('profile-yayasan');

Route::get('/program-pendidikan', function () {
    return view('program-pendidikan');
})->name('program-pendidikan');

Route::get('/program-unggulan', function () {
    return view('program-unggulan');
})->name('program-unggulan');

Route::get('/faq', function () {
    return view('faq');
})->name('faq');

Route::middleware('auth')->group(function () {
    Route::get('/akun', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/akun', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/akun', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ROUTES GURU
Route::prefix('guru')->group(function () {
    Route::view('/', 'pages.presensi.guru.dashboard-presensi')->name('dashboard-presensi');
    Route::view('/presensi-guru', 'pages.presensi.guru.presensi-guru')->name('presensi-guru');
    Route::view('/riwayat-presensi-guru', 'pages.presensi.guru.riwayat-presensi-guru')->name('riwayat-presensi-guru');
    Route::view('/dashboard-presensi-murid', 'pages.presensi.guru.dashboard-presensi-murid')->name('dashboard-presensi-murid');
    Route::view('/dashboard-presensi-tk', 'pages.presensi.guru.dashboard-presensi-tk')->name('dashboard-presensi-tk');
    Route::view('/presensi-tk-a', 'pages.presensi.guru.presensi-tk-a')->name('presensi-tk-a');
    Route::view('/presensi-tk-b', 'pages.presensi.guru.presensi-tk-b')->name('presensi-tk-b');
    Route::view('/presensi-bestari', 'pages.presensi.guru.presensi-bestari')->name('presensi-bestari');
    Route::view('/presensi-daycare', 'pages.presensi.guru.presensi-daycare')->name('presensi-daycare');
});


// ROUTES ADMIN
Route::prefix('admin')->group(function () {
    Route::view('/', 'pages.presensi.admin.dashboard-admin')->name('dashboard-admin');
    Route::view('/kelola-guru', 'pages.presensi.admin.kelola-guru')->name('kelola-guru');
    Route::view('/kelola-kelas', 'pages.presensi.admin.kelola-kelas')->name('kelola-kelas');
    Route::view('/kelola-kelas-daycare', 'pages.presensi.admin.kelola-kelas-daycare')->name('kelola-kelas-daycare');
    Route::view('/kelola-kelas-tk', 'pages.presensi.admin.kelola-kelas-tk')->name('kelola-kelas-tk');
    Route::view('/kelola-kelas-tk-a', 'pages.presensi.admin.kelola-kelas-tk-a')->name('kelola-kelas-tk-a');
    Route::view('/kelola-kelas-tk-b', 'pages.presensi.admin.kelola-kelas-tk-b')->name('kelola-kelas-tk-b');
    Route::view('/kelola-kelas-bestari', 'pages.presensi.admin.kelola-kelas-bestari')->name('kelola-kelas-bestari');
    Route::view('/kelola-laporan', 'pages.presensi.admin.kelola-laporan')->name('kelola-laporan');
    Route::view('/opsi-bulan-laporan', 'pages.presensi.admin.opsi-bulan-laporan')->name('opsi-bulan-laporan');
    Route::view('/laporan-guru', 'pages.presensi.admin.laporan-guru')->name('laporan-guru');
    Route::view('/laporan-daycare', 'pages.presensi.admin.laporan-daycare')->name('laporan-daycare');
    Route::view('/laporan-tk', 'pages.presensi.admin.laporan-tk')->name('laporan-tk');
});


require __DIR__.'/auth.php';
