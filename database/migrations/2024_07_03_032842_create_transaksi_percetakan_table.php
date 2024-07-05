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
        Schema::create('transaksi_percetakan', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->constrained('users');
            $table->enum('type', ['pesan_bahan', 'pesan_alat']);
            $table->string('kode_transaksi')->nullable();
            $table->date('tanggal_masuk')->nullable();
            $table->foreignUuid('alat_id')->references('id')->on('alat_percetakans')->onDelete('cascade');
            $table->integer('jumlah')->nullable();
            $table->foreignUuid('supplier_id')->nullable()->references('id')->on('suppliers')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_percetakan');
    }
};
