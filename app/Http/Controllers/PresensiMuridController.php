<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\PresensiMurid;
use App\Exports\PresensiMuridExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PresensiMuridController extends Controller
{
    public function index(){
        $presensiMurid = PresensiMurid::all();
        return view('');
    }

    public function export(){
        return Excel::download(new PresensiMuridExport(),'presensi-murid-'.Carbon::now()->timestamp.'.xlsx');
    }
}
