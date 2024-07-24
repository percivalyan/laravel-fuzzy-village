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

    public function harga()
    {
        return $this->hasOne(Harga::class);
    }
    public function foto()
    {
        return $this->hasOne(Foto::class);
    }

    public function kesuburan()
    {
        return $this->hasOne(Kesuburan::class);
    }

    public function periode()
    {
        return $this->hasOne(Periode::class);
    }
}
