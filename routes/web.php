<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    $articles = DB::table('article')->get();
    return view('index', ['articles' => $articles]);
});

Route::get('/index', function () {
    return view('welcome');
});

Route::get('/porto', function () {
    return view('porto');
});

Route::get('/biodata', function () {
    return view('article');
});
Route::get('/admin', function () {
    return view('admin.index');
})->name('admin');

Route::get('/artikel', function () {
    return view('admin.artikel');
})->name('artikel');

Route::get('/biodata', function () {
    return view('article');
});