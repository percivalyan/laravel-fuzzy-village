<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Harga extends Model
{
    use HasFactory;

    protected $fillable = [
        'harga_per_hektar',
        'luas_per_hektar',
        'harga_sebenarnya',
    ];

    public $timestamps = true;
}
