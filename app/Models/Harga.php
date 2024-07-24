<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Harga extends Model
{
    use HasFactory;

    protected $fillable = [
        'lahan_id',
        'harga_per_hektar',
        'luas_per_hektar',
        'harga_sebenarnya',
    ];

    public $timestamps = true;

    public function lahan()
    {
        return $this->belongsTo(Lahan::class);
    }
}
