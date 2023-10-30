<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $primaryKey = 'id_transaksi';

    protected $casts = [
        'id_transaksi' => 'string',
    ];

    protected $fiiled = [
        'id_pegawai',
        'id_reservasi',
        'tgl_transaksi',
        'diskon',
        'pajak',
        'total_pembayaran',
        'jumlah_pembayaran',
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai');
    }

    public function reservasi()
    {
        return $this->belongsTo(Reservasi::class, 'id_reservasi', 'id');
    }
}
