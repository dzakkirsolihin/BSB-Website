<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\PresensiGuru;
use App\Exports\PresensiGuruExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PresensiGuruController extends Controller
{
    public function index(){
        $presensiGuru = PresensiGuru::all();
        return view('');
    }

    public function export(){
        return Excel::download(new PresensiGuruExport(),'presensi-guru-'.Carbon::now()->timestamp.'.xlsx');
    }
}
