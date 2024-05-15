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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// mendaftarkan fungsi index dari KategoriController pada route /kategori
Route::get('/kategori', [App\Http\Controllers\KategoriController::class, 'index'])->name('daftarKategori');


// mendaftarkan fungsi index dari ArtikelController pada route /artikel
Route::get('/artikel', [App\Http\Controllers\ArtikelController::class, 'index'])->name('daftarArtikel');

// route untuk menampilkan view create kategori
Route::get('/kategori/create', [App\Http\Controllers\KategoriController::class, 'create'])->name('createKategori');

// route untuk menyimpan kategori, perhatikan bahwa fungsi route nya adalah post
Route::post('/kategori/create', [App\Http\Controllers\KategoriController::class, 'store'])->name('storeKategori');


// route untuk menampilkan view edit kategori
Route::get('/kategori/{id}/edit', [App\Http\Controllers\KategoriController::class, 'edit'])->name('editKategori');

// route untuk menyimpan perubahan kategori, perhatikan bahwa fungsi routenya adalah post
Route::post('/kategori/{id}/edit', [App\Http\Controllers\KategoriController::class, 'update'])->name('updateKategori');

// route untuk menampilkan view create artikel
Route::get('/artikel/create', [App\Http\Controllers\ArtikelController::class, 'create'])->name('createArtikel');

// route untuk menyimpan artikel, perhatikan bahwa fungsi routenya adalah post
Route::post('/artikel/create', [App\Http\Controllers\ArtikelController::class, 'store'])->name('storeArtikel');

// route untuk menampilkan view edit artikel
Route::get('/artikel/{id}/edit', [App\Http\Controllers\ArtikelController::class, 'edit'])->name('editArtikel');

// route untuk menyimpan perubahan artikel, perhatikan bahwa fungsi routenya adalah post
Route::post('/artikel/{id}/edit', [App\Http\Controllers\ArtikelController::class, 'update'])->name('updateArtikel');

Route::get('/kategori/{id}/delete', [App\Http\Controllers\KategoriController::class, 'destroy'])->name('deleteKategori');

Route::get('/artikel/{id}/delete', [App\Http\Controllers\ArtikelController::class, 'destroy'])->name('deleteArtikel');