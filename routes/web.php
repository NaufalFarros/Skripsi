<?php

use App\Http\Controllers\dataiotController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/sensor',[dataiotController::class,'ajax']);

Route::group(['prefix' => 'admin', 'middleware' => ['auth','verified']], function () {
    Route::get('/', function () {
        return view('admin.index');
    })->name('admin');
    
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
    Route::get('/datasensor',[dataiotController::class,'index'])->name('datasensor.index');
    Route::get('/tabelsensor',[dataiotController::class,'datatable'])->name('tabelsensor.datatable');

    Route::put('profile/update/{id}', [App\Http\Controllers\ProfileController::class, 'UbahPassword'])->name('profile.update');
    // Route::put('donasi/nonactive/{donasi}',[AprroveController::class,'nonactive'])->name('donasi.nonactive');
    // Route::put('donasi/active/{donasi}', [AprroveController::class,'active'])->name('donasi.active');
   
    // Route::put('transaksi/nonactive/{donasi}',[TransaksiController::class,'nonactive'])->name('trans.nonactive');
    // Route::put('transaksi/active/{donasi}', [TransaksiController::class,'active'])->name('trans.active');


    // Route::resource('/transaksi', TransaksiController::class);
    // Route::resource('/artikel-admin', ArtikelAdminController::class);
    // Route::resource('/donasi-admin', DonasiAdminController::class);
    // Route::resource('/profile-setting', ProfileAdminController::class);

    // Route::prefix('/transaksi')->group(function () {
    //     Route::get('/', [TransaksiController::class, 'index'])->name('admin.transaksi.index');
    //     Route::get('/{id}', [TransaksiController::class, 'show'])->name('admin.transaksi.show');
    //     Route::put('/{id}/edit', [TransaksiController::class, 'update'])->name('admin.transaksi.update');
    // });
});


Auth::routes(['verify' => true]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
