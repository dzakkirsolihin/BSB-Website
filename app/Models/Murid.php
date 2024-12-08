<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Murid extends Model
{
    use SoftDeletes;

    protected $fillable = ['no_induk', 'nis', 'nama_siswa', 'jk', 'telp', 'alamat'];

    public function kelas()
    {
        return $this->belongsTo('App\Models\Kelas')->withDefault();
    }

    protected $table = 'siswa';
}
