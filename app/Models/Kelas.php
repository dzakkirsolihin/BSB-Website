<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kelas extends Model
{
    use SoftDeletes;

    protected $fillable = ['nama_kelas', 'is_daycare', 'is_tk'];


    protected $table = 'kelas';
}
