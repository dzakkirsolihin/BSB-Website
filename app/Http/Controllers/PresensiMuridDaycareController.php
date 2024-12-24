<?php

namespace App\Http\Controllers;

use App\Models\MuridDaycare;
use Illuminate\Http\Request;

class PresensiMuridDaycareController extends Controller
{
    public function muridKelasDaycare()
    {
        $dataMuridDaycare = MuridDaycare::where('kelas_id', 1)->get();
        return view('presensi.guru.presensi-daycare', compact('dataMuridDaycare'));
    }
}
