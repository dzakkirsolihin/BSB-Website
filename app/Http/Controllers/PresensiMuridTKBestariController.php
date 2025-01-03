<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\PresensiMuridTKBestari;
use App\Exports\PresensiMuridExport;
use App\Models\MuridTKBestari;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PresensiMuridTKBestariController extends Controller
{
    public function muridKelasTkA()
    {
        $dataMuridTkA = MuridTKBestari::where('kelas_id', 2)->with(['presensi' => function($query) {
            $query->whereDate('created_at', Carbon::now()->format('Y-m-d'));
        }])->get();
        $today = Carbon::now()->format('Y-m-d');

        // Ambil data presensi hari ini
        $existingAttendance = PresensiMuridTKBestari::whereDate('created_at', $today)->whereIn('no_induk', $dataMuridTkA->pluck('no_induk'))->get(); // Filter by students in class A
        return view('presensi.guru.presensi-tk-a', compact('dataMuridTkA', 'existingAttendance'));
    }

    public function muridKelasTkB()
    {
        $dataMuridTkB = MuridTKBestari::where('kelas_id', 3)->with(['presensi' => function($query) {
            $query->whereDate('created_at', Carbon::now()->format('Y-m-d'));
        }])->get();

        // Check if attendance exists for today
        $today = Carbon::now()->format('Y-m-d');
        $existingAttendance = PresensiMuridTKBestari::whereDate('created_at', $today)->whereIn('no_induk', $dataMuridTkB->pluck('no_induk'))->get(); // Filter by students in class B
        return view('presensi.guru.presensi-tk-b', compact('dataMuridTkB', 'existingAttendance'));
    }
    public function muridKelasBestari()
    {
        $dataMuridBestari = MuridTKBestari::where('kelas_id', 4)->with(['presensi' => function($query) {
            $query->whereDate('created_at', Carbon::now()->format('Y-m-d'));
        }])->get();

        // Check if attendance exists for today
        $today = Carbon::now()->format('Y-m-d');
        $existingAttendance = PresensiMuridTKBestari::whereDate('created_at', $today)->whereIn('no_induk', $dataMuridBestari->pluck('no_induk'))->get(); // Filter by students in class Bestari
        return view('presensi.guru.presensi-bestari', compact('dataMuridBestari', 'existingAttendance'));
    }

    public function store(Request $request)
    {
        try {
            $attendance = $request->input('attendance');
            $date = $request->input('date');

            foreach ($attendance as $studentId => $data) {
                PresensiMuridTKBestari::create([
                    'no_induk' => $studentId,
                    'kehadiran' => $data['status'] === 'hadir' ? 'H' : '-',
                    'keterangan' => $data['keterangan'],
                    'created_at' => $date,
                ]);
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Presensi berhasil disimpan'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal menyimpan presensi: ' . $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request)
    {
        try {
            $attendance = $request->input('attendance');
            $date = $request->input('date');

            foreach ($attendance as $studentId => $data) {
                $presensi = PresensiMuridTKBestari::where('no_induk', $studentId)
                    ->whereDate('created_at', $date)
                    ->first();

                if ($presensi) {
                    // Update existing attendance
                    $presensi->update([
                        'kehadiran' => $data['status'] === 'hadir' ? 'H' : '-',
                        'keterangan' => $data['keterangan'],
                    ]);
                }
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Presensi berhasil diperbarui'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal memperbarui presensi: ' . $e->getMessage()
            ], 500);
        }
    }
}
