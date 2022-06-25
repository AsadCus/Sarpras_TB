<?php

use App\Models\Barang;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\BarangKeluarController;

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
Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('/proseslogin', [LoginController::class, 'proseslogin'])->name('proseslogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// =================== MIDDLEWARE =================== //
Route::group(['middleware' => ['auth', 'disable_back']], function () {
    Route::get('/main', [HomeController::class, 'main'])->name('main');

    // =================== ROUTE HOME =================== //
    Route::get('/operator',[HomeController::class,'operator'])->name('operator');
    Route::get('/guru',[HomeController::class,'guru'])->name('guru');
    Route::get('/barang',[HomeController::class,'barang'])->name('barang');
    Route::get('/siswa',[HomeController::class,'siswa'])->name('siswa');
    Route::get('/inventory',[HomeController::class,'inventory'])->name('inventory');

    // =================== RESOURCE =================== //
    Route::resource('barang', BarangController::class);
    Route::resource('inventory', InventoryController::class);
    Route::resource('peminjaman', PeminjamanController::class);
    Route::resource('operator', OperatorController::class);
    Route::resource('pengembalian', PengembalianController::class);
    Route::resource('pengeluaran', BarangKeluarController::class);

    // =================== LIVE SEARCH =================== //
    Route::get("search", [BarangController::class, 'search']);
    Route::get("searchp", [PeminjamanController::class, 'searchp']);
    Route::get("searching", [InventoryController::class, 'searching']);
    Route::get("searchop", [OperatorController::class, 'searchop']);
    Route::get("searchpengembalian", [PengembalianController::class, 'searchpengembalian']);
});

// =================== Export Execel =================== //
Route::get('/exportexcelbarang', [BarangController::class, 'exportexcelbarang'])->name('expo    rtexcelbarang');
Route::get('/exportexcelinventory', [InventoryController::class, 'exportexcelinventory'])->name('exportexcelinventory');
Route::get('/exportexcelpeminjaman', [PengembalianController::class, 'exportexcelpeminjaman'])->name('exportexcelpeminjaman');

// =================== Export PDF =================== //
Route::get('/exportbarangAll', [BarangController::class, 'exportbarangAll'])->name('barangAllpdf');
Route::get('/exportinventoryAll', [InventoryController::class, 'exportinventoryAll'])->name('inventoryAllpdf');
Route::get('/exportpengembalianAll', [PengembalianController::class, 'exportpengembalianAll'])->name('pengembalianAllpdf');


Route::get('/panduan', function(){
    $file = public_path()."/panduanpengguna.pdf";

    $headers = array(
        'Content-Type: application/pdf',
    );

    return response()->file($file, $headers);
});
Route::get('/barang/detail/{id}',[BarangController::class,'detail'])->name('detail');
Route::get('/inventory/detail/{id}',[InventoryController::class,'detail'])->name('detail');
Route::get('/peminjaman/detail/{id}',[PeminjamanController::class,'detail'])->name('detail');
Route::get('/pengeluaran/detail/{id}',[BarangKeluarController::class,'detail'])->name('detail');