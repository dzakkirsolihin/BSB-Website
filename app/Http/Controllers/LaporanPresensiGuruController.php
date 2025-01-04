<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Guru;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanPresensiGuruController extends Controller
{
    public function unduhLaporanGuruPdf(Request $request)
    {
        $tanggal = Carbon::parse($request->tanggal);
        $month = $tanggal->format('m');
        $year = $tanggal->format('Y');

        // Get current route name to determine which teachers to fetch
        $currentRoute = $request->route()->getName();
        $kelasIds = [];
        $jenis = '';

        if ($currentRoute === 'laporan-guru-tk.unduh-pdf') {
            $kelasIds = [2, 3, 4]; // TK A, TK B, and Bestari
            $jenis = 'TK';
            $kelas = 'TK'; // Define the class name
        } elseif ($currentRoute === 'laporan-guru-daycare.unduh-pdf') {
            $kelasIds = [1]; // Daycare
            $jenis = 'Daycare';
            $kelas = 'Daycare'; // Define the class name
        }

        // Get teachers data based on kelas_id
        $guru = Guru::whereIn('kelas_id', $kelasIds)->get();

        // Create an array to store all teachers' attendance data
        $allTeachersData = [];

        foreach ($guru as $teacher) {
            $presensi = $teacher->presensi()
                ->whereMonth('created_at', $month)
                ->whereYear('created_at', $year)
                ->get();

            // Format data for PDF
            $presensiData = $presensi->map(function($presensi) {
                return [
                    'tanggal' => $presensi->created_at->format('d-m-Y'),
                    'kehadiran' => $presensi->status_kehadiran,
                    'jam_masuk' => $presensi->jam_datang,
                    'jam_pulang' => $presensi->jam_pulang,
                    'keterangan' => $presensi->keterangan,
                    'koordinat' => $presensi->koordinat,
                    'foto' => $presensi->foto
                ];
            });

            $allTeachersData[] = [
                'guru' => $teacher,
                'presensiData' => $presensiData
            ];
        }

        // Generate PDF with all teachers' data
        $pdf = Pdf::loadView('presensi.pdf.guru-download', [
            'allTeachersData' => $allTeachersData,
            'month' => $month,
            'year' => $year,
            'kelas' => $kelas, // Pass the kelas variable to the view
        ]);

        return $pdf->download("laporan-presensi-guru-{$jenis}-{$month}-{$year}.pdf");
    }
}
