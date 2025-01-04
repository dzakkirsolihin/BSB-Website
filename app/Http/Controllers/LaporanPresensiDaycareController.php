<?php

namespace App\Http\Controllers;

use App\Models\PresensiMuridDaycare;
use App\Models\MuridDaycare;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LaporanPresensiDaycareController extends Controller
{
    public function index()
    {
        return view('presensi.admin.laporan-daycare');
    }

    public function getPresensiByDate(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date_format:Y-m-d',
        ]);

        // Ambil semua murid daycare
        $muridDaycare = MuridDaycare::where('kelas_id', 1)->get();

        // Ambil data presensi untuk tanggal yang dipilih
        $presensiData = PresensiMuridDaycare::where('tanggal', $request->tanggal)
            ->get()
            ->keyBy('no_induk');

        $laporanData = $muridDaycare->map(function ($murid, $index) use ($presensiData) {
            $presensi = $presensiData->get($murid->no_induk);

            // Cek jika data pengantar ada
            $pengantar = '-';
            if ($presensi && $presensi->pengantar) {
                $pengantar = $presensi->pengantar === 'keluarga' ? 
                    "Keluarga ({$presensi->detail_pengantar})" : 
                    ucfirst($presensi->pengantar);
            }

            // Cek jika data penjemput ada
            $penjemput = '-';
            if ($presensi && $presensi->penjemput) {
                $penjemput = $presensi->penjemput === 'keluarga' ? 
                    "Keluarga ({$presensi->detail_penjemput})" : 
                    ucfirst($presensi->penjemput);
            }

            return [
                'no' => $index + 1,
                'nama' => $murid->nama_siswa,
                'pengantar' => $pengantar,
                'waktu_datang' => $presensi && $presensi->waktu_datang ? 
                    Carbon::parse($presensi->waktu_datang)->format('H:i') : 
                    '-',
                'penjemput' => $penjemput,
                'waktu_pulang' => $presensi && $presensi->waktu_pulang ? 
                    Carbon::parse($presensi->waktu_pulang)->format('H:i') : 
                    '-'
            ];
        });

        return response()->json([
            'status' => 'success',
            'data' => $laporanData
        ]);
    }
}