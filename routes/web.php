<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
//Route::get('/home', [HomeController::class, 'index']);|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes([
    // 'register' => false,
    // 'reset' => false
]);

Route::get('/home', [HomeController::class, 'kategori']);

Route::get('/modal', function () {return view('layouts.modal');});

Route::prefix('kategori')->group(function () {
    Route::get('/tambah', [HomeController::class, 'kategori_tambah']);
    Route::post('/aksi', [HomeController::class, 'kategori_aksi']);
    Route::get('/edit/{id}', [HomeController::class, 'kategori_edit']);
    Route::put('/update/{id}', [HomeController::class, 'kategori_update']);
    Route::get('/hapus/{id}', [HomeController::class, 'kategori_hapus']);
});
