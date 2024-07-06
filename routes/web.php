<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Barang\BarangController;
use App\Http\Controllers\Admin\Supplier\SupplierController;
use App\Http\Controllers\Admin\Transaksi\TransaksiBarangMasukController;
use App\Http\Controllers\Admin\Transaksi\TransaksiBarangKeluarController;
use App\Http\Controllers\Admin\Transaksi\TransaksiPesananBahanController;
use App\Http\Controllers\Admin\Transaksi\TransaksiPesananAlatController;
use App\Http\Controllers\Admin\Laporan\StokBarangController;
use App\Http\Controllers\Admin\Laporan\BarangMasukController;
use App\Http\Controllers\Admin\Laporan\BarangKeluarController;
use App\Http\Controllers\Admin\Laporan\StokBahanBakuController;
use App\Http\Controllers\Admin\Laporan\PesananBahanController;
use App\Http\Controllers\Admin\Laporan\AlatPercetakanController;
// use App\Http\Controllers\Owner\Karyawan\KaryawanController;


Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::middleware(['auth.both'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/update/profile', [DashboardController::class, 'updateprofile'])->name('updateprofile');

    Route::get('/barang', [BarangController::class, 'index'])->name('barang');
    Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier');

    Route::get('/stok-barang', [StokBarangController::class, 'index'])->name('stokbarang');

    Route::get('/daftar-barang-masuk', [BarangMasukController::class, 'index'])->name('daftarbarangmasuk');
    Route::get('/download-laporan', [BarangMasukController::class, 'downloadpdf']);
    Route::get('/download-excel', [BarangMasukController::class, 'downloadExcel']);

    Route::get('/daftar-barang-keluar', [BarangKeluarController::class, 'index'])->name('daftarbarangkeluar');
    Route::get('/download-laporan-keluar', [BarangKeluarController::class, 'downloadpdf']);
    Route::get('/download-excel-keluar', [BarangKeluarController::class, 'downloadExcel']);

    Route::get('/stok-bahan-baku', [StokBahanBakuController::class, 'index'])->name('stokbahanbaku');

    Route::get('/alat-percetakan', [AlatPercetakanController::class, 'index'])->name('alatpercetakan');
});

require __DIR__.'/karyawan.php';
require __DIR__.'/owner.php';