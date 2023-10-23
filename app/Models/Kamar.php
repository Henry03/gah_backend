<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;

    protected $table = "kamar";

    protected $fillable = [
        'id',
        'id_jenis_kamar',
        'id_status_kamar',
        'tempat_tidur',
        'kapasitas',
        'deskripsi',
        'rincian',
    ];

    public function jenis_kamar()
    {
        return $this->belongsTo(JenisKamar::class, 'id_jenis_kamar');
    }

    public function status_kamar()
    {
        return $this->belongsTo(StatusKamar::class, 'id_status_kamar');
    }
}
