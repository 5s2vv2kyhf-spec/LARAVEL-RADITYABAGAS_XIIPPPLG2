<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtikelController;
use App\Models\Article;

// --- Public routes ---
Route::get('/', function () {
    $articles = Article::all();
    return view('index', ['articles' => $articles]);
});

Route::get('/porto', function () {
    return view('porto');
});

Route::get('/biodata', function () {
    return view('article');
});

// --- Admin routes ---
Route::get('/admin', function () {
    return view('admin.index');
})->name('admin');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/artikel',             [ArtikelController::class, 'index'])->name('artikel.index');
    Route::get('/artikel/tambah',      [ArtikelController::class, 'create'])->name('artikel.create');
    Route::post('/artikel/tambah',     [ArtikelController::class, 'store'])->name('artikel.store');
    Route::get('/artikel/{id}/edit',   [ArtikelController::class, 'edit'])->name('artikel.edit');
    Route::put('/artikel/{id}',        [ArtikelController::class, 'update'])->name('artikel.update');
    Route::delete('/artikel/{id}',     [ArtikelController::class, 'destroy'])->name('artikel.destroy');
});

// Alias so old route('artikel') references still work
Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel');
