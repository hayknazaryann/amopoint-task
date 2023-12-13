<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ListController;
use Illuminate\Support\Facades\Route;

Route::get('', [HomeController::class, 'index'])->name('home');
Route::get('import', [FileController::class, 'index'])->name('import');
Route::post('import/file', [FileController::class, 'import'])->name('import.file');
Route::get('list', [ListController::class, 'index'])->name('list');

Route::prefix('login')->group(function(){
    Route::get('', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('', [LoginController::class, 'login']);
});

Route::middleware('auth')->group(function(){
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('visitors', [ListController::class, 'visitors'])->name('visitors');
});
