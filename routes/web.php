<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImagesCarouselController;

Route::get('/', [ImagesCarouselController::class, 'home'])->name('index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


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

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// ROUTES GURU
Route::prefix('guru')->group(function () {
    Route::view('/', 'presensi.guru.dashboard-presensi')->name('dashboard-presensi');
    Route::view('/presensi-guru', 'presensi.guru.presensi-guru')->name('presensi-guru');
    Route::view('/riwayat-presensi-guru', 'presensi.guru.riwayat-presensi-guru')->name('riwayat-presensi-guru');
    Route::view('/dashboard-presensi-murid', 'presensi.guru.dashboard-presensi-murid')->name('dashboard-presensi-murid');
    Route::view('/dashboard-presensi-tk', 'presensi.guru.dashboard-presensi-tk')->name('dashboard-presensi-tk');
    Route::view('/presensi-tk-a', 'presensi.guru.presensi-tk-a')->name('presensi-tk-a');
    Route::view('/presensi-tk-b', 'presensi.guru.presensi-tk-b')->name('presensi-tk-b');
    Route::view('/presensi-bestari', 'presensi.guru.presensi-bestari')->name('presensi-bestari');
    Route::view('/presensi-daycare', 'presensi.guru.presensi-daycare')->name('presensi-daycare');
});


// ROUTES ADMIN
Route::prefix('admin')->group(function () {
    Route::view('/', 'presensi.admin.dashboard-admin')->name('dashboard-admin');
    Route::view('/kelola-guru', 'presensi.admin.kelola-guru')->name('kelola-guru');
    Route::view('/kelola-kelas', 'presensi.admin.kelola-kelas')->name('kelola-kelas');
    Route::view('/kelola-kelas-daycare', 'presensi.admin.kelola-kelas-daycare')->name('kelola-kelas-daycare');
    Route::view('/kelola-kelas-tk', 'presensi.admin.kelola-kelas-tk')->name('kelola-kelas-tk');
    Route::view('/kelola-kelas-tk-a', 'presensi.admin.kelola-kelas-tk-a')->name('kelola-kelas-tk-a');
    Route::view('/kelola-kelas-tk-b', 'presensi.admin.kelola-kelas-tk-b')->name('kelola-kelas-tk-b');
    Route::view('/kelola-kelas-bestari', 'presensi.admin.kelola-kelas-bestari')->name('kelola-kelas-bestari');
    Route::view('/kelola-laporan', 'presensi.admin.kelola-laporan')->name('kelola-laporan');
    Route::view('/laporan-guru-daycare', 'presensi.admin.laporan-guru-daycare')->name('laporan-guru-daycare');
    Route::view('/laporan-guru-tk', 'presensi.admin.laporan-guru-tk')->name('laporan-guru-tk');
    Route::view('/laporan-daycare', 'presensi.admin.laporan-daycare')->name('laporan-daycare');
    Route::view('/laporan-tk-a', 'presensi.admin.laporan-tk-a')->name('laporan-tk-a');
    Route::view('/laporan-tk-b', 'presensi.admin.laporan-tk-b')->name('laporan-tk-b');
    Route::view('/laporan-bestari', 'presensi.admin.laporan-bestari')->name('laporan-bestari');
});


require __DIR__.'/auth.php';

