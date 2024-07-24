<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    use HasFactory;

    protected $fillable = [
        'lahan_id',
        'nama_tim_penggarap',
        'jumlah_penggarap',
        'nama_penggarap',
        'tanggal_pengerjaan_sawah_awal',
        'tanggal_pengerjaan_sawah_akhir',
        'penyewa',
        'harga_sewa_lahan',
        'harga_pupuk',
        'harga_irigasi',
        'jumlah_panen',
        'gaji_penggarap_per_orang',
        'keterangan',
    ];

    // Define relationships if needed
    public function lahan()
    {
        return $this->belongsTo(Lahan::class);
    }
}
