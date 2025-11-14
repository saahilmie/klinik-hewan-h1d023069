<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $table = 'pasien';

    protected $fillable = [
        'nama_hewan',
        'jenis_hewan',
        'jenis_hewan_lainnya',
        'umur',
        'nama_pemilik',
        'no_telepon',
        'diagnosa',
        'tanggal_check_in',
        'tanggal_check_out',
        'status',
        'tanggal_kematian',
        'biaya_perawatan',
    ];

    protected $casts = [
        'tanggal_check_in' => 'date',
        'tanggal_check_out' => 'date',
        'tanggal_kematian' => 'date',
        'biaya_perawatan' => 'decimal:2',
    ];
}
