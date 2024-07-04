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
        Schema::create('transaksi_percetakan_detail', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('transaksi_percetakan_id')->references('id')->on('transaksi_percetakan');
            $table->foreignUuid('barang_id')->references('id')->on('barangs');
            $table->integer('quantity');
            $table->decimal('harga_jual', 15, 2);
            $table->decimal('harga_beli', 15, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_percetakan_detail');
    }
};
