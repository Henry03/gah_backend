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
        return $this->hasOne(Transaksi::class, 'id_reservasi', 'id');
    }

    public function customer()
    {
        return $this->hasOne(Customer::class,  'id', 'id_customer');
    }

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai', 'id');
    }

    public function deposit()
    {
        return $this->hasOne(Deposit::class, 'id');
    }

    public function promo()
    {
        return $this->hasOne(Promo::class, 'id_promo', 'id');
    }

    public function uang_jaminan()
    {
        return $this->hasOne(UangJaminan::class, 'id');
    }
}
