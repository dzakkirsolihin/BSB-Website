<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Guru extends Model
{
    use SoftDeletes;

    protected $fillable = ['nip', 'nama_guru', 'jk', 'telp', 'alamat', 'kelas_id'];

    protected $table = 'guru';

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'nip', 'nip');
    }
}
