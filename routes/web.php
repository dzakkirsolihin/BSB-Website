<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImagesCarouselController;

Route::get('/', function () {
    return view('home');
})->name('index');;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/profile', [ImagesCarouselController::class, 'index'])->name('profile');

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

require __DIR__.'/auth.php';

