<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kelas extends Model
{
    use SoftDeletes;

    protected $fillable = ['nama_kelas', 'nip', 'is_daycare', 'is_tk'];

    public function guru()
    {
        return $this->belongsTo('App\Models\Guru')->withDefault();
    }

    protected $table = 'kelas';
}
