<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\MemberController;
use App\Http\Middleware\CheckAdminRole;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

// Rute Autentikasi (Guest)
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rute Terproteksi (Harus Login)
Route::middleware(['auth'])->group(function () {

    Route::get('/', function () {
        return redirect()->route('books.index');
    });

    // Rute Khusus Admin
    Route::middleware([CheckAdminRole::class])->group(function () {
        Route::resource('categories', CategoryController::class)->except(['show']);
    });

    // Rute Petugas & Admin
    Route::resource('books', BookController::class);
    Route::resource('members', MemberController::class);
    Route::resource('loans', LoanController::class);
    Route::patch('/loans/{id}/kembalikan', [LoanController::class, 'kembalikan'])
        ->name('loans.kembalikan');

    Route::get('/profil', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('/profil/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');
});