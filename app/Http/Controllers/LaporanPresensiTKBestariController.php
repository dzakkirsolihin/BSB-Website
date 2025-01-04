<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\PresensiMuridTKBestari;
use App\Models\MuridTKBestari;
use App\Exports\PresensiMuridTKBestariExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;


class LaporanPresensiTKBestariController extends Controller
{
    public function laporanTkA(Request $request)
    {
        $presensiData = collect();

        if ($request->has('tanggal')) {
            $tanggal = Carbon::parse($request->tanggal)->format('Y-m-d');

            // Get all TK A students (kelas_id = 2) with their attendance records
            $muridTkA = MuridTKBestari::where('kelas_id', 2)
                ->with([
                    'presensi' => function ($query) use ($tanggal) {
                        $query->whereDate('created_at', $tanggal);
                    }
                ])
                ->get();

            // Format the data for display
            $presensiData = $muridTkA->map(function ($murid) {
                $presensi = $murid->presensi->first();
                return [
                    'id' => $murid->id,
                    'nama' => $murid->nama_siswa,
                    'kehadiran' => $presensi ? ($presensi->kehadiran === 'H' ? 'Hadir' : 'Tidak Hadir') : 'Tidak Hadir',
                    'keterangan' => $presensi ? $presensi->keterangan : '-'
                ];
            });
        }

        // Check if presensiData is empty and pass that information to the view
        $dataAvailable = !$presensiData->isEmpty();

        return view('presensi.admin.laporan-tk-a', compact('presensiData', 'dataAvailable'));
    }

    public function laporanTkB(Request $request)
    {
        $presensiData = collect();

        if ($request->has('tanggal')) {
            $tanggal = Carbon::parse($request->tanggal)->format('Y-m-d');

            // Get all TK B students (kelas_id = 3) with their attendance records
            $muridTkB = MuridTKBestari::where('kelas_id', 3)
                ->with([
                    'presensi' => function ($query) use ($tanggal) {
                        $query->whereDate('created_at', $tanggal);
                    }
                ])
                ->get();

            // Format the data for display
            $presensiData = $muridTkB->map(function ($murid) {
                $presensi = $murid->presensi->first();
                return [
                    'id' => $murid->id,
                    'nama' => $murid->nama_siswa,
                    'kehadiran' => $presensi ? ($presensi->kehadiran === 'H' ? 'Hadir' : 'Tidak Hadir') : 'Tidak Hadir',
                    'keterangan' => $presensi ? $presensi->keterangan : '-'
                ];
            });
        }

        // Check if presensiData is empty and pass that information to the view
        $dataAvailable = !$presensiData->isEmpty();

        return view('presensi.admin.laporan-tk-b', compact('presensiData', 'dataAvailable'));
    }

    public function laporanBestari(Request $request)
    {
        $presensiData = collect();

        if ($request->has('tanggal')) {
            $tanggal = Carbon::parse($request->tanggal)->format('Y-m-d');

            // Get all Bestari students (kelas_id = 4) with their attendance records
            $muridBestari = MuridTKBestari::where('kelas_id', 4)
                ->with([
                    'presensi' => function ($query) use ($tanggal) {
                        $query->whereDate('created_at', $tanggal);
                    }
                ])
                ->get();

            // Format the data for display
            $presensiData = $muridBestari->map(function ($murid) {
                $presensi = $murid->presensi->first();
                return [
                    'id' => $murid->id,
                    'nama' => $murid->nama_siswa,
                    'kehadiran' => $presensi ? ($presensi->kehadiran === 'H' ? 'Hadir' : 'Tidak Hadir') : 'Tidak Hadir',
                    'keterangan' => $presensi ? $presensi->keterangan : '-'
                ];
            });
        }

        // Check if presensiData is empty and pass that information to the view
        $dataAvailable = !$presensiData->isEmpty();

        return view('presensi.admin.laporan-bestari', compact('presensiData', 'dataAvailable'));
    }

    public function unduhLaporanPdf(Request $request)
    {
        $tanggal = Carbon::parse($request->tanggal)->format('Y-m-d');

        // Get current route name
        $currentRoute = $request->route()->getName();

        // Set kelasId based on the route
        $kelasId = null;
        $kelas = '';

        if ($currentRoute === 'laporan-tk-a.unduh-pdf') {
            $kelasId = 2;
            $kelas = 'TK A';
        } elseif ($currentRoute === 'laporan-tk-b.unduh-pdf') {
            $kelasId = 3;
            $kelas = 'TK B';
        } elseif ($currentRoute === 'laporan-bestari.unduh-pdf') {
            $kelasId = 4;
            $kelas = 'Bestari';
        }

        // Get student data for the specific class
        $murid = MuridTKBestari::where('kelas_id', $kelasId)
            ->with(['presensi' => function($query) use ($tanggal) {
                $query->whereDate('created_at', $tanggal);
            }])
            ->get();

        // Format data for PDF
        $presensiData = $murid->map(function($murid) {
            $presensi = $murid->presensi->first();
            return [
                'id' => $murid->id,
                'nama' => $murid->nama_siswa,
                'kehadiran' => $presensi ? ($presensi->kehadiran === 'H' ? 'Hadir' : 'Tidak Hadir') : 'Tidak Hadir',
                'keterangan' => $presensi ? $presensi->keterangan : '-'
            ];
        });

        // Generate PDF
        $pdf = Pdf::loadView('presensi.pdf.tk-bestari-download', [
            'kelas' => $kelas,
            'tanggal' => Carbon::parse($tanggal)->isoFormat('dddd, D MMMM Y'),
            'presensiData' => $presensiData
        ]);

        return $pdf->download("laporan-presensi-{$kelas}-{$tanggal}.pdf");
    }
}
