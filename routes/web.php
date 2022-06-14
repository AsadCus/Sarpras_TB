<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InventoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PeminjamanController;

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

// =================== ROUTE LOGIN =================== //
Route::get('/',[LoginController::class,'login'])->name('login');
Route::post('/proseslogin',[LoginController::class,'proseslogin'])->name('proseslogin');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');

// =================== MIDDLEWARE =================== //
Route::group(['middleware' => ['auth']], function(){
    Route::get('/main',[HomeController::class,'main'])->name('main');
    
    // =================== ROUTE HOME =================== //
    Route::get('/kunci',[HomeController::class,'kunci'])->name('kunci');
    Route::get('/guru',[HomeController::class,'guru'])->name('guru');
    Route::get('/barang',[HomeController::class,'barang'])->name('barang');
    Route::get('/siswa',[HomeController::class,'siswa'])->name('siswa');
    Route::get('/inventory',[HomeController::class,'inventory'])->name('inventory');
    Route::get('/pinjam-guru',[HomeController::class,'pinjam_guru'])->name('pinjam_guru');
    Route::get('/pinjam-siswa',[HomeController::class,'pinjam_siswa'])->name('pinjam_siswa');

    // =================== RESOURCE =================== //
    Route::resource('barang',BarangController::class);
    Route::resource('inventory',InventoryController::class);
    Route::resource('peminjaman',PeminjamanController::class);

    // =================== LIVE SEARCH =================== //
    Route::get("search",[BarangController::class,'search']);
    Route::get("searchp",[PeminjamanController::class,'searchp']);
    Route::get("searching",[InventoryController::class,'searching']);
});
