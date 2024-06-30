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
use App\Http\Controllers\Owner\Karyawan\KaryawanController;

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

Route::get('/register', [RegisterController::class, 'index'])->name('register');

Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/update/profile', [DashboardController::class, 'updateprofile'])->name('updateprofile');

Route::get('/barang', [BarangController::class, 'index'])->name('barang');
Route::get('/barang/create', [BarangController::class, 'create'])->name('barang.create');
// Route::post('/barang', [BarangController::class, 'store'])->name('barang.store');

Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier');
Route::get('/supplier/create', [SupplierController::class, 'create'])->name('supplier.create');

Route::get('/barang-masuk/create', [TransaksiBarangMasukController::class, 'index'])->name('barangmasuk.create');

Route::get('/barang-keluar/create', [TransaksiBarangKeluarController::class, 'index'])->name('barangkeluar.create');

Route::get('/stok-barang', [StokBarangController::class, 'index'])->name('stokbarang');

Route::get('/daftar-barang-masuk', [BarangMasukController::class, 'index'])->name('daftarbarangmasuk');

Route::get('/daftar-barang-keluar', [BarangKeluarController::class, 'index'])->name('daftarbarangkeluar');

Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan');

Route::get('/karyawan/create', [KaryawanController::class, 'create'])->name('karyawan.create');

Route::get('/stok-bahan-baku', [StokBahanBakuController::class, 'index'])->name('stokbahanbaku');

Route::get('/alat-percetakan', [AlatPercetakanController::class, 'index'])->name('alatpercetakan');
Route::get('/alat-percetakan/create', [AlatPercetakanController::class, 'create'])->name('alatpercetakan.create');

Route::get('/pesanan-alat', [TransaksiPesananAlatController::class, 'index'])->name('pesananalat.create');
Route::get('/pesanan-bahan', [TransaksiPesananBahanController::class, 'index'])->name('pesananbahan.create');