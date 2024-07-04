<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksi_atk', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->enum('type', ['masuk', 'keluar']);
            $table->foreignUuid('user_id')->references('id')->on('users');
            $table->string('kode_transaksi')->nullable();
            $table->date('tanggal_masuk')->nullable();
            $table->foreignUuid('barang_id')->references('id')->on('barangs');
            $table->integer('jumlah')->nullable();
            $table->foreignUuid('supplier_id')->references('id')->on('suppliers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_atk');
    }
};
