<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\MuridDaycare;
use Illuminate\Http\Request;
use App\Models\PresensiMuridDaycare;

class PresensiMuridDaycareController extends Controller
{
    public function muridKelasDaycare()
    {
        $dataMuridDaycare = MuridDaycare::where('kelas_id', 1)->get();
        
        // Get today's date
        $today = Carbon::today();
        
        // Get or create presensi records for today
        foreach ($dataMuridDaycare as $murid) {
            PresensiMuridDaycare::firstOrCreate(
                [
                    'no_induk' => $murid->no_induk,
                    'tanggal' => $today
                ],
                [
                    'status_kehadiran' => 'tidak_hadir'
                ]
            );
        }
        
        // Get today's presensi data
        $presensiHariIni = PresensiMuridDaycare::where('tanggal', $today)
            ->get()
            ->keyBy('no_induk');
            
        return view('presensi.guru.presensi-daycare', compact('dataMuridDaycare', 'presensiHariIni'));
    }

    public function storePresensiDatang(Request $request)
    {
        $request->validate([
            'no_induk' => 'required|exists:murid_daycare,no_induk',
            'pengantar' => 'required|in:ayah,ibu,keluarga',
            'detail_pengantar' => 'required_if:pengantar,keluarga'
        ]);

        $presensi = PresensiMuridDaycare::updateOrCreate(
            [
                'no_induk' => $request->no_induk,
                'tanggal' => Carbon::today()
            ],
            [
                'waktu_datang' => Carbon::now(),
                'pengantar' => $request->pengantar,
                'detail_pengantar' => $request->detail_pengantar,
                'status_kehadiran' => 'hadir'
            ]
        );

        return response()->json([
            'status' => 'success',
            'message' => 'Presensi datang berhasil dicatat',
            'data' => $presensi
        ]);
    }

    public function storePresensiPulang(Request $request)
    {
        $request->validate([
            'no_induk' => 'required|exists:murid_daycare,no_induk',
            'penjemput' => 'required|in:ayah,ibu,keluarga',
            'detail_penjemput' => 'required_if:penjemput,keluarga'
        ]);

        $presensi = PresensiMuridDaycare::where('no_induk', $request->no_induk)
            ->where('tanggal', Carbon::today())
            ->first();

        if (!$presensi || $presensi->status_kehadiran !== 'hadir') {
            return response()->json([
                'status' => 'error',
                'message' => 'Tidak dapat mencatat presensi pulang karena belum ada presensi datang'
            ], 400);
        }

        $presensi->update([
            'waktu_pulang' => Carbon::now(),
            'penjemput' => $request->penjemput,
            'detail_penjemput' => $request->detail_penjemput
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Presensi pulang berhasil dicatat',
            'data' => $presensi
        ]);
    }
}
