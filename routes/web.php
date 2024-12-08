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

require __DIR__.'/auth.php';
