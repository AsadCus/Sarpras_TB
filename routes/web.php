<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
});
// =================== ROUTE LOGIN =================== //
Route::get('/',[LoginController::class,'login'])->name('login');
Route::post('/proseslogin',[LoginController::class,'proseslogin'])->name('proseslogin');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');
