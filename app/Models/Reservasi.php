<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;

    protected $table = 'reservasi';

    protected $fillable = [
        'id_pegawai',
        'id_customer',
        'id_deposit',
        'id_promo',
        'id_uang_jaminan',
        'id_booking',
        'tgl_reservasi',
        'tgl_check_in',
        'tgl_check_out',
        'kota',
        'jumlah_dewasa',
        'jumlah_anak',
        'status_reservasi'
    ];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_customer', 'id_customer');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'id_customer', 'id');
    }
}
