<?php

namespace App\Exports;

use App\Models\PresensiMurid;
use Maatwebsite\Excel\Concerns\FromCollection;

class PresensiMuridExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return PresensiMurid::all();
    }
}
