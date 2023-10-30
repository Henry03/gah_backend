<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UangJaminan extends Model
{
    use HasFactory;
    
    protected $table = 'uang_jaminan';

    protected $fillable = [
        'jumlah'
    ];
}
