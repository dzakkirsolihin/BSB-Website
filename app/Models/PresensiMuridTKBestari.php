<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PresensiMuridTKBestari extends Model
{
    use HasFactory;

    protected $table = 'presensi_murid_tk_bestari';
    protected $fillable = ['no_induk', 'kehadiran', 'keterangan'];

    public function murid()
    {
        return $this->belongsTo(MuridTKBestari::class, 'no_induk', 'no_induk');
    }
}
