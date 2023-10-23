<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKamar extends Model
{
    use HasFactory;

    protected $table = "jenis_kamar";
    
    protected $fillable = [
        'nama_jenis_kamar',
        'harga',
        'gambar',
    ];
}
