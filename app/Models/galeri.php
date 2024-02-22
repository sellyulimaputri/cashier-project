<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class galeri extends Model
{
    use HasFactory;
    protected $table = 'galeri';
    protected $primaryKey = 'idGaleri';
    protected $fillable = ['idGaleri','foto','judul','deskripsi'];
}
