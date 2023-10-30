<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisCustomer extends Model
{
    use HasFactory;

    protected $table = "jenis_customer";

    protected $fillable = [
        'nama_jenis_customer',
    ];

    
}
