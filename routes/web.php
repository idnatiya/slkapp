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

Route::get('/logout', function() {
	Auth::logout(); 
	return redirect()->route('dashboard'); 
}); 

Route::middleware(['auth:sanctum'])->group(function () {
	
	Route::get('/', 'App\Http\Controllers\DashboardController@index')->name('dashboard'); 
	Route::post('/day', '\App\Http\Controllers\DashboardController@day')->name('dashboard.day'); 
	Route::post('/month', '\App\Http\Controllers\DashboardController@month')->name('dashboard.month'); 

	Route::get('/master-barang-kategori-datatables', 'App\Http\Controllers\MasterBarangKategoriController@datatables'); 
	Route::resource('master-barang-kategori', \App\Http\Controllers\MasterBarangKategoriController::class); 

	Route::get('/master-barang-datatables', 'App\Http\Controllers\MasterBarangController@datatables'); 
	Route::post('/master-barang-find', '\App\Http\Controllers\MasterBarangController@find')->name('master_barang.find'); 
	Route::post('master-barang-statistik', '\App\Http\Controllers\MasterBarangController@statistik')->name('master_barang.statistik'); 
	Route::resource('master-barang', \App\Http\Controllers\MasterBarangController::class); 

	Route::get('/konfigurasi', 'App\Http\Controllers\KonfigurasiController@form')->name('konfigurasi.form'); 
	Route::patch('/konfigurasi', 'App\Http\Controllers\KonfigurasiController@update')->name('konfigurasi.update'); 

	Route::get('/supplier-datatables', 'App\Http\Controllers\SupplierController@datatables'); 
	Route::resource('supplier', \App\Http\Controllers\SupplierController::class); 

	Route::prefix('penjualan')->group(function() {
		Route::get('/', 'App\Http\Controllers\PenjualanController@index')->name('penjualan.index'); 
		Route::get('/kwitansi/{id}', 'App\Http\Controllers\PenjualanController@kwitansi')->name('penjualan.kwitansi'); 
		Route::post('/', 'App\Http\Controllers\PenjualanController@store')->name('penjualan.store'); 
		Route::post('/nomor', 'App\Http\Controllers\PenjualanController@getNomor')->name('penjualan.get-nomor'); 
		Route::get('/create', 'App\Http\Controllers\PenjualanController@create')->name('penjualan.create'); 
	}); 

	Route::resource('penjualan_barang', \App\Http\Controllers\PenjualanController::class);

	Route::get('/penjualan-datatable', 'App\Http\Controllers\PenjualanController@datatables')->name("penjualan-datatable");

	Route::prefix('pembelian')->group(function() {
		Route::post('/search', 'App\Http\Controllers\PembelianController@search')->name('pembelian.search');  
		Route::post('/find', 'App\Http\Controllers\PembelianController@find')->name('pembelian.find'); 
	}); 

	Route::resource('pembelian_barang', \App\Http\Controllers\PembelianController::class);
	Route::get('/pembelian-datatable', 'App\Http\Controllers\PembelianController@datatables')->name("pembelian-datatable");

	Route::prefix('laporan')->group(function() {
		Route::get('/', 'App\Http\Controllers\LaporanController@index')->name('laporan.index');  
		Route::get('/penjualan', 'App\Http\Controllers\LaporanController@penjualan')->name('laporan.penjualan');  
		Route::get('/laba', 'App\Http\Controllers\LaporanController@laba')->name('laporan.laba');  
	});

	Route::prefix('kwitansi')->group(function() {
		Route::get('/', 'App\Http\Controllers\kwitansiController@index')->name('kwitansi.index');
		Route::post('/store', 'App\Http\Controllers\kwitansiController@store')->name('kwitansi.store');
	}); 
});
