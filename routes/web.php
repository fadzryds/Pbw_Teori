<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\KomentarController;

// ini route untuk landing page news. Jadi pas user akses '/' akan diarahkan ke method index di NewsController
Route::get('', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
Route::post('/news', [NewsController::class, 'store'])->name('news.store');
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');

// ini route untuk menampilkan detail news berdasarkan id news yang diakses
// misal route nya jadi /news/1 maka method show akan menampilkan detail news dengan id 1
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');
Route::post('/komentar', [KomentarController::class, 'store'])->name('komentar.store');

