<?php

use App\Http\Controllers\FileController;
use App\Http\Controllers\ListController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [FileController::class, 'index'])->name('import');
Route::post('import', [FileController::class, 'import'])->name('import.file');

Route::get('list', [ListController::class, 'index'])->name('list');
