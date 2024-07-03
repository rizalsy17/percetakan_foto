<?php


use Illuminate\Support\Facades\Route;
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

Route::middleware(['auth:web'])->group(function () {
    Route::get('/barang/create', [BarangController::class, 'create'])->name('barang.create');
    Route::post('/barang', [BarangController::class, 'store'])->name('barang.store');
    Route::get('/barang/{barang}/edit', [BarangController::class, 'edit'])->name('barang.edit');
    Route::put('/barang/{barang}', [BarangController::class, 'update'])->name('barang.update'); // Rute untuk update
    Route::delete('/barang/{barang}', [BarangController::class, 'destroy'])->name('barang.destroy'); // Rute untuk hapus

    Route::get('/supplier/create', [SupplierController::class, 'create'])->name('supplier.create');
    Route::post('/supplier', [SupplierController::class, 'store'])->name('supplier.store');
    Route::get('/supplier/{supplier}/edit', [SupplierController::class, 'edit'])->name('supplier.edit');
    Route::put('/supplier/{supplier}', [SupplierController::class, 'update'])->name('supplier.update'); // Rute untuk update
    Route::delete('/supplier/{supplier}', [SupplierController::class, 'destroy'])->name('supplier.destroy'); // Rute untuk hapus

    Route::get('/barang-masuk/create', [TransaksiBarangMasukController::class, 'index'])->name('barangmasuk.create');

    Route::get('/barang-keluar/create', [TransaksiBarangKeluarController::class, 'index'])->name('barangkeluar.create');

    Route::get('/alat-percetakan/create', [AlatPercetakanController::class, 'create'])->name('alatpercetakan.create');

    Route::get('/pesanan-alat', [TransaksiPesananAlatController::class, 'index'])->name('pesananalat.create');
    Route::get('/pesanan-bahan', [TransaksiPesananBahanController::class, 'index'])->name('pesananbahan.create');
});