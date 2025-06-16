<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Login Manual
Route::get('/login', [AuthController::class, 'showLogin'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Dashboard
Route::get('/dashboard', [HomeController::class, 'index'])->middleware('auth')->name('dashboard');
Route::get('/', [HomeController::class, 'index'])->middleware('auth');

// Book Routes
Route::middleware('auth')->group(function () {
    Route::resource('books', BookController::class);
});

// Borrowing Routes
Route::middleware('auth')->group(function () {
    Route::post('/borrow/{book}', [BorrowingController::class, 'borrow'])->name('borrow.book');
    Route::post('/return/{borrowing}', [BorrowingController::class, 'return'])->name('return.book');
});
Route::middleware('auth')->group(function () {
    Route::get('/borrow/form/{book}', [BorrowingController::class, 'showBorrowForm'])->name('borrow.form');
    Route::post('/borrow/submit/{book}', [BorrowingController::class, 'submitBorrow'])->name('borrow.submit');
});

// Rekap
Route::get('/rekap/peminjaman', [App\Http\Controllers\BorrowingController::class, 'rekapPeminjaman'])->name('rekap.peminjaman');
Route::get('/rekap/pengembalian', [App\Http\Controllers\BorrowingController::class, 'rekapPengembalian'])->name('rekap.pengembalian');
Route::get('/rekap/peminjaman/export', [App\Http\Controllers\BorrowingController::class, 'exportPeminjaman'])->name('rekap.peminjaman.export');


Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::get('/users/edit', [UserController::class, 'edit'])->name('users.edit');
Route::resource('users', UserController::class);

Route::middleware('auth')->group(function () {
    Route::get('/borrow', [BorrowingController::class, 'borrowList'])->name('borrow.book.list');
    Route::get('/return', [BorrowingController::class, 'returnList'])->name('return.book.list');
});
// Jika Anda tidak punya register, hilangkan ini juga:
# Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
