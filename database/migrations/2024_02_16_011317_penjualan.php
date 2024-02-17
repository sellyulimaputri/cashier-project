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
        Schema::create('penjualan', function (Blueprint $table) {
            $table->id('idPenjualan');
            $table->date('tanggalPenjualan');
            $table->decimal('totalHarga');
            $table->unsignedBigInteger('idPelanggan');
            $table->unsignedBigInteger('idProduk');
            $table->unsignedBigInteger('idPetugas');
            $table->foreign('idPelanggan')->references('idPelanggan')->on('pelanggan');
            $table->foreign('idProduk')->references('idProduk')->on('produk');
            $table->foreign('idPetugas')->references('idPetugas')->on('petugas');
            $table->boolean('IsDelete')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};