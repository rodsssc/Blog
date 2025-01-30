<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

use Faker\Factory as Faker;

Route::get('/', function () {
    return view('index');
});


Route::resource('index',PostController::class)->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';



Route::middleware(['auth'])->group(function () {
    Route::resource('comment', CommentController::class);
    Route::post('comment', [CommentController::class, 'store'])->name('comment.store');
    Route::get('comment', [CommentController::class, 'index'])->name('comment.index');
});



Route::resource('user-profile', UserProfileController::class)->middleware('auth');