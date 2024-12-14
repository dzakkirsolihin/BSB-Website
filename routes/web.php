<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ImagesCarouselController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\GuruMiddleware;
use App\Http\Middleware\CheckRoleMiddleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
        Route::get('/', function () {
            return view('presensi.guru.dashboard-guru');
        })->name('dashboard');
        Route::get('/', function () {
            return view('presensi.guru.dashboard-guru');
        })->name('dashboard-guru');
        Route::get('/presensi-guru', function () {
            return view('presensi.guru.presensi-guru');
        })->name('presensi-guru');
        Route::get('/riwayat-presensi-guru', function () {
            return view('presensi.guru.riwayat-presensi-guru');
        })->name('riwayat-presensi-guru');
        Route::get('/dashboard-presensi-murid', function () {
            return view('presensi.guru.dashboard-presensi-murid');
        })->name('dashboard-presensi-murid');
        Route::get('/dashboard-presensi-tk', function () {
            return view('presensi.guru.dashboard-presensi-tk');
        })->name('dashboard-presensi-tk');
        Route::get('/presensi-tk-a', function () {
            return view('presensi.guru.presensi-tk-a');
        })->name('presensi-tk-a');
        Route::get('/presensi-tk-b', function () {
            return view('presensi.guru.presensi-tk-b');
        })->name('presensi-tk-b');
        Route::get('/presensi-bestari', function () {
            return view('presensi.guru.presensi-bestari');
        })->name('presensi-bestari');
        Route::get('/presensi-daycare', function () {
            return view('presensi.guru.presensi-daycare');
        })->name('presensi-daycare');
    });

    Route::middleware(['auth', CheckRoleMiddleware::class])->group(function () {
        Route::get('/akun', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/akun', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/akun', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::prefix('/dashboard-admin')->group(function () {
            // Rute Admin
            Route::get('/', function () {
                return view('presensi.admin.dashboard-admin');
            })->name('dashboard-admin');
            Route::get('/kelola-guru', function () {
                return view('presensi.admin.kelola-guru');
            })->name('kelola-guru');
            Route::get('/kelola-kelas', function () {
                return view('presensi.admin.kelola-kelas');
            })->name('kelola-kelas');
            Route::get('/kelola-kelas-daycare', function () {
                return view('presensi.admin.kelola-kelas-daycare');
            })->name('kelola-kelas-daycare');
            Route::get('/kelola-kelas-tk', function () {
                return view('presensi.admin.kelola-kelas-tk');
            })->name('kelola-kelas-tk');
            Route::get('/kelola-kelas-tk-a', function () {
                return view('presensi.admin.kelola-kelas-tk-a');
            })->name('kelola-kelas-tk-a');
            Route::get('/kelola-kelas-tk-b', function () {
                return view('presensi.admin.kelola-kelas-tk-b');
            })->name('kelola-kelas-tk-b');
            Route::get('/kelola-kelas-bestari', function () {
                return view('presensi.admin.kelola-kelas-bestari');
            })->name('kelola-kelas-bestari');
            Route::get('/kelola-laporan', function () {
                return view('presensi.admin.kelola-laporan');
            })->name('kelola-laporan');
            Route::get('/laporan-guru', function () {
                return view('presensi.admin.laporan-guru');
            })->name('laporan-guru');
            Route::get('/laporan-daycare', function () {
                return view('presensi.admin.laporan-daycare');
            })->name('laporan-daycare');
            Route::get('/laporan-tk', function () {
                return view('presensi.admin.laporan-tk');
            })->name('laporan-tk');
        });
    });
});

require __DIR__.'/auth.php';
