<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;

    protected $fillable = [
        'lahan_id',
        'foto_1',
        'keterangan_1',
        'foto_2',
        'keterangan_2',
        'foto_3',
        'keterangan_3',
        'foto_4',
        'keterangan_4'
    ];

    public function lahan()
    {
        return $this->belongsTo(Lahan::class);
    }
}
