<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PresensiGuru extends Model
{
    protected $fillable = ['nip', 'tanggal', 'kehadiran_id', 'foto'];

    public function guru(){
        return $this->belongsTo('App\Models\Guru')->withDefault();
    }

    public function kehadiran(){
        return $this->belongsTo('App\Models\Kehadiran')->withDefault();
    }

    protected $table = 'presensi_guru';
}
