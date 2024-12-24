<?php

namespace App\Exports;

use App\Models\PresensiMuridTKBestari;
use Maatwebsite\Excel\Concerns\FromCollection;

class PresensiMuridTKBestariExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return PresensiMuridTKBestari::all();
    }
}
