<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lahan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor_lahan',
        'status_lahan',
        'pemilik',
        'lokasi',
        'koordinat',
        'keterangan',
    ];

    public function foto()
    {
        return $this->hasOne(Foto::class);
    }
}
