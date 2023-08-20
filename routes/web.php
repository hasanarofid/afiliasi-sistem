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

Route::get('auth/google', [App\Http\Controllers\LoginController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [App\Http\Controllers\LoginController::class, 'handleGoogleCallback']);

Auth::routes();

// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

// route penel dashboard for admin
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    // route menu produk 
    Route::prefix('produk')->group(function () {
        Route::get('/',  [App\Http\Controllers\ProdukController::class, 'index'])->name('produk.index');
        Route::get('/get-produk',[App\Httpdashboard\Controllers\ProdukController::class, 'getdata'])->name('produk.list');
        Route::get('/add-produk', [App\Http\Controllers\ProdukController::class, 'add'])->name('produk.add');
        Route::post('/store-produk',[App\Http\Controllers\ProdukController::class, 'store'] )->name('produk.store');
        Route::get('/edit-produk/{id}',[App\Http\Controllers\ProdukController::class, 'edit'])->name('produk.edit');
        Route::post('/update-produk/{id}', [App\Http\Controllers\ProdukController::class, 'update'])->name('produk.update');
        Route::get('/hapus-produk{id}', [App\Http\Controllers\ProdukController::class, 'hapus'])->name('produk.hapus');
    });
    // end route menu produk 

     // route menu afiliasi 
    Route::prefix('afiliasi')->group(function () {
        Route::get('/',  [App\Http\Controllers\AfiliasiController::class, 'index'])->name('afiliasi.index');
        Route::get('/get-afiliasi',[App\Httpdashboard\Controllers\AfiliasiController::class, 'getdata'])->name('afiliasi.list');
        Route::get('/add-afiliasi', [App\Http\Controllers\AfiliasiController::class, 'add'])->name('afiliasi.add');
        Route::post('/store-afiliasi',[App\Http\Controllers\AfiliasiController::class, 'store'] )->name('afiliasi.store');
        Route::get('/edit-afiliasi/{id}',[App\Http\Controllers\AfiliasiController::class, 'edit'])->name('afiliasi.edit');
        Route::post('/update-afiliasi/{id}', [App\Http\Controllers\AfiliasiController::class, 'update'])->name('afiliasi.update');
        Route::get('/hapus-afiliasi{id}', [App\Http\Controllers\AfiliasiController::class, 'hapus'])->name('afiliasi.hapus');
    });
    // end route menu afiliasi 

    // route menu member 
    Route::prefix('member')->group(function () {
        Route::get('/',  [App\Http\Controllers\MemberController::class, 'index'])->name('member.index');
        Route::get('/get-member',[App\Httpdashboard\Controllers\MemberController::class, 'getdata'])->name('member.list');
        Route::get('/add-member', [App\Http\Controllers\MemberController::class, 'add'])->name('member.add');
        Route::post('/store-member',[App\Http\Controllers\MemberController::class, 'store'] )->name('member.store');
        Route::get('/edit-member/{id}',[App\Http\Controllers\MemberController::class, 'edit'])->name('member.edit');
        Route::post('/update-member/{id}', [App\Http\Controllers\MemberController::class, 'update'])->name('member.update');
        Route::get('/hapus-member{id}', [App\Http\Controllers\MemberController::class, 'hapus'])->name('member.hapus');
    });
    // end route menu member 

     // route menu member 
    Route::prefix('customer')->group(function () {
        Route::get('/',  [App\Http\Controllers\CustomerController::class, 'index'])->name('customer.index');
        Route::get('/get-customer',[App\Httpdashboard\Controllers\CustomerController::class, 'getdata'])->name('customer.list');
        Route::get('/add-customer', [App\Http\Controllers\CustomerController::class, 'add'])->name('customer.add');
        Route::post('/store-customer',[App\Http\Controllers\CustomerController::class, 'store'] )->name('customer.store');
        Route::get('/edit-customer/{id}',[App\Http\Controllers\CustomerController::class, 'edit'])->name('customer.edit');
        Route::post('/update-customer/{id}', [App\Http\Controllers\CustomerController::class, 'update'])->name('customer.update');
        Route::get('/hapus-customer{id}', [App\Http\Controllers\CustomerController::class, 'hapus'])->name('customer.hapus');
    });
    // end route menu customer 
 });