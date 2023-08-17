<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SuplierController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\PersediaanController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\TransaksiController;


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

Route::get('/', function () {
    return view('welcome');
});
// --------RUTE MENU DASHBOARD--------//
Route::get('/dashboard', [DashboardController::class, 'index']);


// --------RUTE MENU OBAT--------//
Route::get('/obat', [ObatController::class, 'index']);
Route::post('/tambahobat', [ObatController::class, 'tambah']);


// --------RUTE MENU PERSEDIAAN--------//
Route::get('/persediaan', [PersediaanController::class, 'index']);


// --------RUTE MENU SUPLIER--------//
// Menampilkan halaman daftar suplier
Route::get('/suplier', [SuplierController::class, 'index']);

// Menambahkan data suplier baru
Route::post('/tambahsuplier', [SuplierController::class, 'tambah']);

// Menampilkan data suplier untuk diedit
Route::get('/get-suplier/{id}', [SuplierController::class, 'getSuplierById']);

// Mengupdate data suplier yang diedit
Route::post('/update-suplier/{id}', [SuplierController::class, 'update']);




// --------RUTE MENU TRANSAKSI--------//
Route::get('/transaksi', [TransaksiController::class, 'index']);



// // --------RUTE MENU PENGELUARAN--------//
// Route::get('/pengeluaran',[PengeluaranController::class, 'index']);



// // --------RUTE MENU PENJUALAN--------//
// Route::get('/penjualan',[PenjualanController::class, 'index']);







// --------RUTE MENU SETTING--------//
// Route::get('/setting',[SettingController::class, 'index']);



// --------RUTE MENU USER--------//
Route::get('/user', [UserController::class, 'index']);
// Menambahkan data user baru
Route::post('/tambahuser', [UserController::class, 'tambah']);
// Menampilkan data user untuk diedit
Route::get('/user/edit/{id}', [UserController::class, 'edit']);
// Mengupdate data user yang diedit
Route::post('/UpdateUser/{id_user}', [UserController::class, 'update'])->name('UpdateUser.update');
// Menghapus data user
Route::delete('/deleteUser/{id_user}', [UserController::class, 'hapus']);
