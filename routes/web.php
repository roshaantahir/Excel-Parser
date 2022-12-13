<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('files',[\App\Http\Controllers\FileController::class, 'index'])->name('files');
Route::get('view/{id}',[\App\Http\Controllers\FileController::class, 'view'])->name('view');
Route::post('parse_file',[\App\Http\Controllers\FileController::class, 'parseFile'])->name('parseFile');
