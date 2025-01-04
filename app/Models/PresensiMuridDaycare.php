<?php

namespace App\Models;

use App\Models\MuridDaycare;
use Illuminate\Database\Eloquent\Model;

class PresensiMuridDaycare extends Model
{
    protected $table = 'presensi_murid_daycare';
    
    protected $fillable = [
        'no_induk',
        'tanggal',
        'waktu_datang',
        'waktu_pulang',
        'pengantar',
        'detail_pengantar',
        'penjemput',
        'detail_penjemput',
        'status_kehadiran'
    ];

    protected $casts = [
        'tanggal' => 'date',
        'waktu_datang' => 'datetime',
        'waktu_pulang' => 'datetime'
    ];

    public function murid()
    {
        return $this->belongsTo(MuridDaycare::class, 'no_induk', 'no_induk');
    }
}
