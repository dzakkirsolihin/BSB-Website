<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PresensiMurid extends Model
{
    protected $fillable = ['no_induk', 'tanggal', 'kehadiran_id'];

    public function murid(){
        return $this->belongsTo('App\Models\Murid')->withDefault();
    }

    public function kehadiran(){
        return $this->belongsTo('App\Models\Kehadiran')->withDefault();
    }

    protected $table = 'presensi_murid';
}
