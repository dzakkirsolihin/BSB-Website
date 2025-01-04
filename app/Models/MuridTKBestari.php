<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MuridTKBestari extends Model
{
    // use SoftDeletes;

    protected $fillable = ['no_induk', 'nis', 'nama_siswa', 'jk', 'no_telp_orang_tua', 'alamat', 'kelas_id'];

    public function kelas()
    {
        return $this->belongsTo('App\Models\Kelas')->withDefault();
    }

    public function presensi()
    {
        return $this->hasMany(PresensiMuridTKBestari::class, 'no_induk', 'no_induk');
    }
    protected $table = 'murid_tk_bestari';
}
