<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ClienController;


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

Route::get('beranda', function() {
    return view('web.template.base');
});
Route::get('shop', function() {
    return view('web.produk.shop');
});
Route::post('shop/filter', [ShopController::class, 'filter']);
Route::resource('shop', ShopController::class);

Route::get('produk', function() {
Route::resource('beranda', ClienController::class);

    return view('web.item1');
});

//manggil item contoh localhost:8000/item/dubai
Route::get('item/{produk}/{hargaMin?}/{hargaMax?}', [HomeController::class, 'item']);

Route::get('template', function() {
    return view('template.base');
});

Route::get('kategori', [HomeController::class, 'showKategori']);
Route::get('promo', [HomeController::class, 'showPromo']);
Route::get('konsultasi', [HomeController::class, 'showKOnsultasi']);

//prefix untun mengkategotikan contoh untuk masuk ke produk harus ada admn (localhost:8000/admin/produk)
//middelawe adalah printah untuk supaya orang yang tidak login tidak bisa mengakses
Route::prefix('admin')->middleware('auth')->group(function(){
    Route::post('produk/filter', [ProdukController::class, 'filter']);
    Route::resource('produk', ProdukController::class);
    Route::resource('user', UserController::class);
    Route::get('beranda', [HomeController::class, 'showBeranda']);
});

Route::get('login', [AuthController::class, 'showLogin'])->name('login');
Route::post('login', [AuthController::class, 'loginProcess']);
Route::get('logout', [AuthController::class, 'logout']);


/*ini adalah rout singgkat untuk CRUD data (dengan catatan harus ada Controller CRUD)
route::resource('produk', ProdukController::class);
route::resource('user', UserController::class);
*/

/*content ini adalah Route manual CRUD data
Route::get('produk', [ProdukController::class, 'index']);
Route::get('produk/create', [ProdukController::class, 'create']);
Route::post('produk', [ProdukController::class, 'store']);
Route::get('produk/{produk}', [produkController::class, 'show']);
Route::get('produk/{produk}/edit', [produkController::class, 'edit']);
Route::put('produk/{produk}', [produkController::class, 'update']);
Route::delete('produk/{produk}', [produkController::class, 'destroy']);

Route::get('user', [UserController::class, 'index']);
Route::get('user/create', [UserController::class, 'create']);
Route::post('user', [UserController::class, 'store']);
Route::get('user/{user}', [UserController::class, 'show']);
Route::get('user/{user}/edit', [UserController::class, 'edit']);
Route::put('user/{user}', [UserController::class, 'update']);
Route::delete('user/{user}', [UserController::class, 'destroy']);
*/

