<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Customer extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $table = "customer";
    protected $guard = 'customer';

    protected $fillable = [
        'id_jenis_customer',
        'no_identitas',
        'jenis_identitas',
        'nama_institusi',
        'nama',
        'email',
        'password',
        'no_telp',
        'alamat',
    ];
    
    protected $hidden = [
        'password',
    ];
}
