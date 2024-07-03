<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Owner\Karyawan\KaryawanController;


Route::middleware(['auth:owner'])->group(function () {
    
   Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan');
   Route::get('/karyawan/create', [KaryawanController::class, 'create'])->name('karyawan.create');
   Route::post('/karyawan', [KaryawanController::class, 'store'])->name('karyawan.store');
   Route::delete('/karyawan/{karyawan}', [KaryawanController::class, 'destroy'])->name('karyawan.destroy'); // Rute untuk hapus

});
