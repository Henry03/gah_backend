<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Pegawai extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $table = "pegawai";

    protected $guard = 'pegawai';

    protected $fillable = [
        'id_role',
        'nama',
        'email',
        'password',
        'no_telp',
        'alamat',
    ];

    protected $hidden = [
        'password',
    ];

    public function role($role)
    {
        if($this->id_role == $role){
            return true;
        }

        return false;
    }
}
