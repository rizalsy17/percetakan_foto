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
        Schema::create('alat_percetakans', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('kode_alat');
            $table->string('nama_alat');
            $table->integer('stok');
            $table->decimal('harga', 15, 2);
            $table->foreignUuid('id_supplier')->references('id')->on('suppliers');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alat_percetakans');
    }
};
