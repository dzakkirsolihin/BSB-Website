<?php

use Illuminate\Support\Facades\Route;
use App\Models\PresensiMuridTKBestari;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\CheckRoleMiddleware;
use App\Http\Controllers\KelolaGuruController;
use App\Http\Controllers\PresensiGuruController;
use App\Http\Controllers\ImagesCarouselController;
use App\Http\Controllers\KelolaKelasDaycareController;
use App\Http\Controllers\KelolaKelasTKBestariController;
use App\Http\Controllers\LaporanPresensiGuruController;
use App\Http\Controllers\PresensiMuridDaycareController;
use App\Http\Controllers\LaporanPresensiDaycareController;
use App\Http\Controllers\PresensiMuridTKBestariController;
use App\Http\Controllers\LaporanPresensiTKBestariController;

Route::get('/', [ImagesCarouselController::class, 'home'])->name('index');

Route::get('/profile', [ImagesCarouselController::class, 'profileYayasan'])->name('profile-yayasan');

Route::prefix('/program-pendidikan')->group(function () {
    Route::view('/tk', 'company_profile.tk')->name('program-tk');
    Route::view('/daycare', 'company_profile.daycare')->name('program-daycare');
});

Route::get('/program-unggulan', function () {
    return view('compapny_profile.home.#program.unggulan');
})->name('program-unggulan');

Route::get('/faq', function () {
    return view('company_profile.faq');
})->name('faq');

// Route::get('/akun', [ProfileController::class, 'edit'])->name('akun.edit');
// Route::patch('/akun/{id}', [ProfileController::class, 'update'])->name('akun.update');
// Route::delete('/akun', [ProfileController::class, 'destroy'])->name('akun.destroy');

Route::middleware('auth')->group(function () {

    Route::prefix('/dashboard-guru')->group(function () {
        // Rute Guru
        Route::view('/', 'presensi.guru.dashboard-guru')->name('dashboard');
        Route::view('/dashboard-guru', 'presensi.guru.dashboard-guru')->name('dashboard-guru');

        Route::get('/presensi-guru', [PresensiGuruController::class, 'index'])->name('presensi-guru');
        Route::post('/presensi-guru/present', [PresensiGuruController::class, 'storePresent']);
        Route::post('/presensi-guru/absent', [PresensiGuruController::class, 'storeAbsent']);
        Route::patch('/presensi-guru/pulang', [PresensiGuruController::class, 'updatePulang']);

        Route::get('/riwayat-presensi-guru', [PresensiGuruController::class, 'riwayat'])->name('riwayat-presensi-guru');
        Route::view('/dashboard-presensi-murid', 'presensi.guru.dashboard-presensi-murid')->name('dashboard-presensi-murid');
        Route::view('/dashboard-presensi-tk', 'presensi.guru.dashboard-presensi-tk')->name('dashboard-presensi-tk');

        Route::post('/presensi-daycare/datang', [PresensiMuridDaycareController::class, 'storePresensiDatang']);
        Route::post('/presensi-daycare/pulang', [PresensiMuridDaycareController::class, 'storePresensiPulang']);
        Route::get('/presensi-tk-a', [PresensiMuridTKBestariController::class, 'muridKelasTkA'])->name('presensi-tk-a');
        Route::get('/presensi-tk-b', [PresensiMuridTKBestariController::class, 'muridKelasTkB'])->name('presensi-tk-b');
        Route::get('/presensi-bestari', [PresensiMuridTKBestariController::class, 'muridKelasBestari'])->name('presensi-bestari');
        Route::post('/presensi-tk-bestari/store', [PresensiMuridTKBestariController::class, 'store'])->name('presensi.tk-bestari.store');
        Route::patch('/presensi-tk-bestari/update', [PresensiMuridTKBestariController::class, 'update'])->name('presensi.tk-bestari.update');


        Route::get('/presensi-daycare', [PresensiMuridDaycareController::class, 'muridKelasDaycare'])->name('presensi-daycare');
    });

    Route::middleware(['auth', CheckRoleMiddleware::class])->group(function () {
        Route::put('/guru/{nip}/update', [KelolaGuruController::class, 'update'])->name('guru.update');
        Route::delete('/guru/{nip}/delete', [KelolaGuruController::class, 'destroy'])->name('guru.destroy');
        Route::delete('/muridDaycare/{no_induk}/delete', [KelolaKelasDaycareController::class, 'destroy'])->name('murid-daycare.destroy');
        Route::delete('/muridTkBestari/{no_induk}/delete', [KelolaKelasTKBestariController::class, 'destroy'])->name('murid-tk.destroy');
        Route::delete('/muridDaycare/{kelas_id}/deleteAll', [KelolaKelasDaycareController::class, 'destroyAll'])->name('muridDaycare.destroyAll');
        Route::delete('/muridTkBestari/{kelas_id}/deleteAll', [KelolaKelasTKBestariController::class, 'destroyAll'])->name('muridTkBestari.destroyAll');
        Route::post('/daycare/store', [KelolaKelasDaycareController::class, 'store'])->name('daycare.store');
        Route::post('/tk/store', [KelolaKelasTKBestariController::class, 'store'])->name('tk.store');
        Route::post('/guru/store', [KelolaGuruController::class, 'store'])->name('guru.store');
        Route::put('/muridDaycare/{id}/update', [KelolaKelasDaycareController::class, 'update'])->name('daycare.update');
        Route::put('/muridTkBestari/{nis}/update', [KelolaKelasTKBestariController::class, 'update'])->name('tk.update');

        Route::prefix('/dashboard-admin')->group(function () {
            // Rute Admin
            Route::view('/', 'presensi.admin.dashboard-admin')->name('dashboard-admin');
            Route::view('/kelola-kelas', 'presensi.admin.kelola-kelas')->name('kelola-kelas');

            // route untuk get data presensi
            Route::get('/get-presensi-guru', [PresensiGuruController::class, 'getPresensiData'])->name('presensi.getData');

            Route::get('/kelola-guru', [KelolaGuruController::class, 'index'])->name('kelola-guru');
            Route::get('/kelola-kelas-tk-a', [KelolaKelasTKBestariController::class, 'kelolaKelasTkA'])->name('kelola-kelas-tk-a');
            Route::get('/kelola-kelas-tk-b', [KelolaKelasTKBestariController::class, 'kelolaKelasTkB'])->name('kelola-kelas-tk-b');
            Route::get('/kelola-kelas-bestari', [KelolaKelasTKBestariController::class, 'kelolaKelasBestari'])->name('kelola-kelas-bestari');
            Route::get('/kelola-kelas-daycare', [KelolaKelasDaycareController::class, 'kelolaKelasDaycare'])->name('kelola-kelas-daycare');

            Route::view('/kelola-laporan', 'presensi.admin.kelola-laporan')->name('kelola-laporan');
            Route::view('/laporan-guru-daycare', 'presensi.admin.laporan-guru-daycare')->name('laporan-guru-daycare');
            Route::view('/laporan-guru-tk', 'presensi.admin.laporan-guru-tk')->name('laporan-guru-tk');
            Route::view('/laporan-daycare', 'presensi.admin.laporan-daycare')->name('laporan-daycare');

            Route::get('/laporan-daycare', [LaporanPresensiDaycareController::class, 'index'])->name('laporan-daycare');
            Route::get('/laporan-daycare/get-data', [LaporanPresensiDaycareController::class, 'getPresensiByDate']);
            Route::get('/laporan-tk-a', [LaporanPresensiTKBestariController::class, 'laporanTkA'])->name('laporan-tk-a');
            Route::get('/laporan-tk-b', [LaporanPresensiTKBestariController::class, 'laporanTkB'])->name('laporan-tk-b');
            Route::get('/laporan-bestari', [LaporanPresensiTKBestariController::class, 'laporanBestari'])->name('laporan-bestari');

            Route::get('/laporan-tk-a/unduh-pdf', [LaporanPresensiTKBestariController::class, 'unduhLaporanPdf'])->name('laporan-tk-a.unduh-pdf');
            Route::get('/laporan-tk-b/unduh-pdf', [LaporanPresensiTKBestariController::class, 'unduhLaporanPdf'])->name('laporan-tk-b.unduh-pdf');
            Route::get('/laporan-bestari/unduh-pdf', [LaporanPresensiTKBestariController::class, 'unduhLaporanPdf'])->name('laporan-bestari.unduh-pdf');

            Route::get('/laporan-guru-tk/unduh-pdf', [LaporanPresensiGuruController::class, 'unduhLaporanGuruPdf'])
            ->name('laporan-guru-tk.unduh-pdf');
            Route::get('/laporan-guru-daycare/unduh-pdf', [LaporanPresensiGuruController::class, 'unduhLaporanGuruPdf'])
                ->name('laporan-guru-daycare.unduh-pdf');
        });
    });
});

require __DIR__ . '/auth.php';
