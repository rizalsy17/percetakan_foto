<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\LoginApiController;
use App\Http\Controllers\Api\Admin\Barang\BarangApiController;
use App\Http\Controllers\Api\Admin\Supplier\SupplierApiController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::post('/login', [LoginApiController::class, 'login']);
Route::post('/logout', [LoginApiController::class, 'logout'])->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/barangs', [BarangApiController::class, 'index']);
    Route::get('/barangs/{barang}', [BarangApiController::class, 'show']);
    Route::post('/barangs', [BarangApiController::class, 'store']);
    Route::put('/barangs/{barang}', [BarangApiController::class, 'update']);
    Route::delete('/barangs/{barang}', [BarangApiController::class, 'destroy']);

    Route::get('suppliers', [SupplierApiController::class, 'index'])->name('api.suppliers.index');
    Route::get('suppliers/{supplier}', [SupplierApiController::class, 'show'])->name('api.suppliers.show');
    Route::post('suppliers', [SupplierApiController::class, 'store'])->name('api.suppliers.store');
    Route::put('suppliers/{supplier}', [SupplierApiController::class, 'update'])->name('api.suppliers.update');
    Route::delete('suppliers/{supplier}', [SupplierApiController::class, 'destroy'])->name('api.suppliers.destroy');
});