<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ArticleController::class,'dashboard'])->name('home');

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::resource('article', ArticleController::class)->except('show');
    Route::resource('tag', TagController::class)->except('show');
    Route::resource('category', CategoryController::class)->except('show');
});

Route::middleware('guest')->group(function () {
    Route::get('article/{article}', [ArticleController::class, 'show'])->name('article.show');
    Route::view('/login', 'auth.login')->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});
