<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarif extends Model
{
    use HasFactory;

    protected $table = 'tarif';

    protected $fillable = [
        'id_jenis_kamar',
        'id_season',
        'tarif',
    ];

    public function jenis_kamar()
    {
        return $this->belongsTo(JenisKamar::class, 'id_jenis_kamar');
    }

    public function season()
    {
        return $this->belongsTo(Season::class, 'id_season');
    }
}
