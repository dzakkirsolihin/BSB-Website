<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PresensiGuruController;
use App\Http\Controllers\ImagesCarouselController;
use App\Http\Controllers\KelolaGuruController;
use App\Http\Controllers\KelolaKelasDaycareController;
use App\Http\Controllers\KelolaKelasTKBestariController;
use App\Http\Controllers\PresensiMuridDaycareController;
use App\Http\Controllers\PresensiMuridTKBestariController;
use App\Http\Middleware\CheckRoleMiddleware;
use App\Models\PresensiMuridTKBestari;
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

// Route::get('/akun', [ProfileController::class, 'edit'])->name('akun.edit');
// Route::patch('/akun/{id}', [ProfileController::class, 'update'])->name('akun.update');
// Route::delete('/akun', [ProfileController::class, 'destroy'])->name('akun.destroy');

// // ROUTES GURU
// Route::prefix('/dashboard')->group(function () {
//     Route::view('/', 'presensi.guru.dashboard-guru')->name('dashboard-presensi');
//     Route::view('/presensi-guru', 'presensi.guru.presensi-guru')->name('presensi-guru');
//     Route::view('/riwayat-presensi-guru', 'presensi.guru.riwayat-presensi-guru')->name('riwayat-presensi-guru');
//     Route::view('/dashboard-presensi-murid', 'presensi.guru.dashboard-presensi-murid')->name('dashboard-presensi-murid');
//     Route::view('/dashboard-presensi-tk', 'presensi.guru.dashboard-presensi-tk')->name('dashboard-presensi-tk');
//     Route::view('/presensi-tk-a', 'presensi.guru.presensi-tk-a')->name('presensi-tk-a');
//     Route::view('/presensi-tk-b', 'presensi.guru.presensi-tk-b')->name('presensi-tk-b');
//     Route::view('/presensi-bestari', 'presensi.guru.presensi-bestari')->name('presensi-bestari');
//     Route::view('/presensi-daycare', 'presensi.guru.presensi-daycare')->name('presensi-daycare');
// });

// // ROUTES ADMIN
// Route::prefix('/dashboard')->group(function () {
//     Route::view('/', 'presensi.admin.dashboard-admin')->name('dashboard-admin');
//     Route::view('/kelola-guru', 'presensi.admin.kelola-guru')->name('kelola-guru');
//     Route::view('/kelola-kelas', 'presensi.admin.kelola-kelas')->name('kelola-kelas');
//     Route::view('/kelola-kelas-daycare', 'presensi.admin.kelola-kelas-daycare')->name('kelola-kelas-daycare');
//     Route::view('/kelola-kelas-tk', 'presensi.admin.kelola-kelas-tk')->name('kelola-kelas-tk');
//     Route::view('/kelola-kelas-tk-a', 'presensi.admin.kelola-kelas-tk-a')->name('kelola-kelas-tk-a');
//     Route::view('/kelola-kelas-tk-b', 'presensi.admin.kelola-kelas-tk-b')->name('kelola-kelas-tk-b');
//     Route::view('/kelola-kelas-bestari', 'presensi.admin.kelola-kelas-bestari')->name('kelola-kelas-bestari');
//     Route::view('/kelola-laporan', 'presensi.admin.kelola-laporan')->name('kelola-laporan');
//     Route::view('/laporan-guru', 'presensi.admin.laporan-guru')->name('laporan-guru');
//     Route::view('/laporan-daycare', 'presensi.admin.laporan-daycare')->name('laporan-daycare');
//     Route::view('/laporan-tk', 'presensi.admin.laporan-tk')->name('laporan-tk');
// });

Route::middleware('auth')->group(function () {

    Route::prefix('/dashboard-guru')->group(function () {
        // Rute Guru
        Route::view('/', 'presensi.guru.dashboard-guru')->name('dashboard');
        Route::view('/dashboard-guru', 'presensi.guru.dashboard-guru')->name('dashboard-guru');

        Route::get('/presensi-guru', [PresensiGuruController::class, 'index'])->name('presensi-guru');
        Route::post('/presensi-guru', [PresensiGuruController::class, 'store']);
        Route::patch('/presensi-guru/update', [PresensiGuruController::class, 'update']);

        Route::view('/riwayat-presensi-guru', 'presensi.guru.riwayat-presensi-guru')->name('riwayat-presensi-guru');
        Route::view('/dashboard-presensi-murid', 'presensi.guru.dashboard-presensi-murid')->name('dashboard-presensi-murid');
        Route::view('/dashboard-presensi-tk', 'presensi.guru.dashboard-presensi-tk')->name('dashboard-presensi-tk');

        Route::get('/presensi-tk-a', [PresensiMuridTKBestariController::class, 'muridKelasTkA'])->name('presensi-tk-a');
        Route::get('/presensi-tk-b', [PresensiMuridTKBestariController::class, 'muridKelasTkB'])->name('presensi-tk-b');
        Route::get('/presensi-bestari', [PresensiMuridTKBestariController::class, 'muridKelasBestari'])->name('presensi-bestari');
        Route::get('/presensi-daycare', [PresensiMuridDaycareController::class, 'muridKelasDaycare'])->name('presensi-daycare');

    });

    Route::middleware(['auth', CheckRoleMiddleware::class])->group(function () {
        Route::put('/guru/{nip}/update', [KelolaGuruController::class, 'update'])->name('guru.update');
        Route::delete('/guru/{nip}/delete', [KelolaGuruController::class, 'destroy'])->name('guru.destroy');
        Route::delete('/muridTkBestari/{nis}/delete', [KelolaKelasTKBestariController::class, 'destroy'])->name('murid.destroy');
        Route::delete('/muridTkBestari/{kelas_id}/deleteAll', [KelolaKelasTKBestariController::class, 'destroyAll'])->name('murid.destroyAll');

        Route::prefix('/dashboard-admin')->group(function () {
            // Rute Admin
            Route::view('/', 'presensi.admin.dashboard-admin')->name('dashboard-admin');
            Route::view('/kelola-kelas', 'presensi.admin.kelola-kelas')->name('kelola-kelas');

            Route::get('/kelola-guru', [KelolaGuruController::class, 'index'])->name('kelola-guru');
            Route::post('/guru/store', [KelolaGuruController::class, 'store'])->name('guru.store');
            Route::get('/kelola-kelas-tk-a', [KelolaKelasTKBestariController::class, 'kelolaKelasTkA'])->name('kelola-kelas-tk-a');
            Route::get('/kelola-kelas-tk-b', [KelolaKelasTKBestariController::class, 'kelolaKelasTkB'])->name('kelola-kelas-tk-b');
            Route::get('/kelola-kelas-bestari', [KelolaKelasTKBestariController::class, 'kelolaKelasBestari'])->name('kelola-kelas-bestari');
            Route::get('/kelola-kelas-daycare', [KelolaKelasDaycareController::class, 'kelolaKelasDaycare'])->name('kelola-kelas-daycare');

            Route::view('/kelola-laporan', 'presensi.admin.kelola-laporan')->name('kelola-laporan');
            Route::view('/laporan-guru-daycare', 'presensi.admin.laporan-guru-daycare')->name('laporan-guru-daycare');
            Route::view('/laporan-guru-tk', 'presensi.admin.laporan-guru-tk')->name('laporan-guru-tk');
            Route::view('/laporan-daycare', 'presensi.admin.laporan-daycare')->name('laporan-daycare');
            Route::view('/laporan-tk-a', 'presensi.admin.laporan-tk-a')->name('laporan-tk-a');
            Route::view('/laporan-tk-b', 'presensi.admin.laporan-tk-b')->name('laporan-tk-b');
            Route::view('/laporan-bestari', 'presensi.admin.laporan-bestari')->name('laporan-bestari');
        });
    });
});



require __DIR__ . '/auth.php';
