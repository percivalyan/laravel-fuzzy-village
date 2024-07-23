<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kesuburan extends Model
{
    use HasFactory;

    protected $fillable = [
        'lahan_id',
        'pH',
        'c_organik',
        'n_total',
        'p_tersedia',
        'k_tersedia',
        'ktk',
        'keterangan',
        'nilai_kesuburan', // tambahkan kolom ini jika diperlukan
    ];

    public function lahan()
    {
        return $this->belongsTo(Lahan::class);
    }
}
