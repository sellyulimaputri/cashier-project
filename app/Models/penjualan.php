<?php

namespace App\Models;

use App\Models\pelanggan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class penjualan extends Model
{
    use HasFactory;
    protected $table = 'penjualan';
    protected $primaryKey = 'idPenjualan';
    protected $fillable = ['idProduk','tanggalPenjualan','totalHarga','idPelanggan','idProduk','idPetugas'];
    
    public function pelanggan()
    {
        return $this->belongsTo(pelanggan::class, 'idPelanggan');
    }
    public function produk()
    {
        return $this->belongsTo(produk::class, 'idProduk');
    }
    public function petugas()
    {
        return $this->belongsTo(petugas::class, 'idPetugas');
    }
}