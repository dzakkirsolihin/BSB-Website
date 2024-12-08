<?php

namespace App\Exports;

use App\Models\PresensiGuru;
use Maatwebsite\Excel\Concerns\FromCollection;

class PresensiGuruExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return PresensiGuru::all();
    }
}
