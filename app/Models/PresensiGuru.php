<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PresensiGuru extends Model
{
    use HasFactory;

    protected $table = 'presensi_guru';

    protected $fillable = [
        'nip',
        'foto',
        'koordinat',
        'jam_datang',
        'jam_pulang',
        'status_kehadiran',
        'keterangan',
        'latitude',
        'longitude'
    ];

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'nip', 'nip');
    }
}
