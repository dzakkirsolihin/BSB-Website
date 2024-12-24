<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\PresensiMurid;
use App\Exports\PresensiMuridExport;
use App\Models\MuridTKBestari;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PresensiMuridTKBestariController extends Controller
{
    public function muridKelasTkA()
    {
        $dataMuridTkA = MuridTKBestari::where('kelas_id', 2)->get();
        return view('presensi.guru.presensi-tk-a', compact('dataMuridTkA'));
    }
    public function muridKelasTkB()
    {
        $dataMuridTkB = MuridTKBestari::where('kelas_id', 3)->get();
        return view('presensi.guru.presensi-tk-b', compact('dataMuridTkB'));
    }
    public function muridKelasBestari()
    {
        $dataMuridBestari = MuridTKBestari::where('kelas_id', 4)->get();
        return view('presensi.guru.presensi-bestari', compact('dataMuridBestari'));
    }
}
