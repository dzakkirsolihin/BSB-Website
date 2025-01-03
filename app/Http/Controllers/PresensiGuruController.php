<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\PresensiGuru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class PresensiGuruController extends Controller
{
    public function index()
    {
        $today = Carbon::now()->format('Y-m-d');
        $yesterday = Carbon::yesterday()->format('Y-m-d');
        $nip = Auth::user()->nip;

        // Check yesterday's attendance for missing checkout
        $yesterdayAttendance = PresensiGuru::where('nip', $nip)
            ->whereDate('created_at', $yesterday)
            ->where('status_kehadiran', 'Hadir')
            ->whereNull('jam_pulang')
            ->first();

        if ($yesterdayAttendance) {
            // Log missing checkout
            Log::info("Missing checkout for NIP: $nip on $yesterday");
        }

        // Check today's attendance
        $todayAttendance = PresensiGuru::where('nip', $nip)
            ->whereDate('created_at', $today)
            ->first();

        $mode = 'default';
        $message = '';

        if ($todayAttendance) {
            if ($todayAttendance->jam_pulang) {
                $message = 'Anda sudah melakukan presensi lengkap hari ini';
            } elseif ($todayAttendance->status_kehadiran === 'Hadir') {
                $mode = 'pulang';
            } else {
                $message = 'Anda sudah melaporkan ketidakhadiran hari ini';
            }
        }

        return view('presensi.guru.presensi-guru', compact('mode', 'message'));
    }

    public function storeAbsent(Request $request)
    {
        try {
            // Validate input
            $validator = Validator::make($request->all(), [
                'status_kehadiran' => 'required|in:Izin,Sakit',
                'keterangan' => 'required|string|min:10|max:500'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'message' => $validator->errors()->first()
                ], 422);
            }

            $nip = Auth::user()->nip;
            $today = Carbon::now()->format('Y-m-d');

            // Check if already present today
            $existingPresensi = PresensiGuru::where('nip', $nip)
                ->whereDate('created_at', $today)
                ->first();

            if ($existingPresensi) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Anda sudah melakukan presensi hari ini'
                ], 400);
            }

            // Create absence record
            PresensiGuru::create([
                'nip' => $nip,
                'status_kehadiran' => $request->status_kehadiran,
                'keterangan' => $request->keterangan
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Ketidakhadiran berhasil disimpan'
            ]);
        } catch (\Exception $e) {
            Log::error('Presensi error: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    public function storePresent(Request $request)
    {
        try {
            // Validate input
            $validator = Validator::make($request->all(), [
                'image' => 'required|string',
                'koordinat' => 'required|string',
                'latitude' => 'required|numeric|between:-90,90',
                'longitude' => 'required|numeric|between:-180,180',
                'keterangan' => 'nullable|string|max:500'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'message' => $validator->errors()->first()
                ], 422);
            }

            $nip = Auth::user()->nip;
            $today = Carbon::now()->format('Y-m-d');

            // Check if already present today
            $existingPresensi = PresensiGuru::where('nip', $nip)
                ->whereDate('created_at', $today)
                ->first();

            if ($existingPresensi) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Anda sudah melakukan presensi hari ini'
                ], 400);
            }

            // Validate base64 image
            if (!preg_match('/^data:image\/png;base64,/', $request->image)) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Format gambar tidak valid'
                ], 422);
            }

            // Process and save image
            $image = $request->image;
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            
            // Validate decoded image
            $decodedImage = base64_decode($image);
            if (!$decodedImage) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Gagal memproses gambar'
                ], 422);
            }

            $imageName = $nip . '_' . time() . '.png';
            $result = Storage::disk('public')->put('presensi/' . $imageName, $decodedImage);

            if (!$result) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Gagal menyimpan gambar'
                ], 500);
            }

            // Create presence record
            PresensiGuru::create([
                'nip' => $nip,
                'foto' => 'presensi/' . $imageName,
                'koordinat' => $request->koordinat,
                'jam_datang' => Carbon::now()->format('H:i:s'),
                'status_kehadiran' => 'Hadir',
                'keterangan' => $request->keterangan,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Presensi datang berhasil disimpan'
            ]);
        } catch (\Exception $e) {
            Log::error('Presensi error: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    public function updatePulang(Request $request)
    {
        try {
            $nip = Auth::user()->nip;
            $today = Carbon::now()->format('Y-m-d');

            $presensi = PresensiGuru::where('nip', $nip)
                ->whereDate('created_at', $today)
                ->whereNull('jam_pulang')
                ->where('status_kehadiran', 'Hadir')
                ->first();

            if (!$presensi) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Data presensi datang tidak ditemukan'
                ], 404);
            }

            $presensi->update([
                'jam_pulang' => Carbon::now()->format('H:i:s')
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Presensi pulang berhasil disimpan'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    public function riwayat()
    {
        $nip = Auth::user()->nip;
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;
        
        $riwayatPresensiGuru = PresensiGuru::where('nip', $nip)
            ->whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('presensi.guru.riwayat-presensi-guru', compact('riwayatPresensiGuru'));
    }

    public function getPresensiData(Request $request)
    {
        try {
            Log::info('Request params:', $request->all()); // Log request parameters

            $tahun = $request->tahun;
            $bulan = $request->bulan;
            $guruNip = json_decode($request->guru);

            Log::info('Decoded guru NIP:', ['nip' => $guruNip]); // Log decoded NIP
            
            $startDate = Carbon::create($tahun, $bulan, 1)->startOfMonth();
            $endDate = Carbon::create($tahun, $bulan, 1)->endOfMonth();
            
            // Validasi bulan masa depan
            if ($startDate->gt(Carbon::now())) {
                return response()->json([]);
            }
            
            // Jika bulan berjalan, ambil data sampai hari ini
            if ($startDate->format('Y-m') === Carbon::now()->format('Y-m')) {
                $endDate = Carbon::now();
            }
            
            $presensi = PresensiGuru::with('guru')  // Eager load guru data
                ->whereIn('nip', $guruNip)
                ->whereBetween('created_at', [$startDate, $endDate])
                ->orderBy('created_at')
                ->get()
                ->map(function ($item) {
                    return [
                        'nip' => $item->nip,
                        'jam_datang' => $item->jam_datang,
                        'jam_pulang' => $item->jam_pulang,
                        'status_kehadiran' => $item->status_kehadiran,
                        'keterangan' => $item->keterangan,
                        'koordinat' => $item->koordinat,
                        'foto' => $item->foto,
                        'created_at' => $item->created_at->format('Y-m-d'),
                        'nama_guru' => $item->guru->nama_guru
                    ];
                });

            Log::info('Query result count:', ['count' => $presensi->count()]); // Log query result
            
            return response()->json($presensi);
        } catch (\Exception $e) {
            Log::error('Error in getPresensiData: ' . $e->getMessage());
            Log::error($e->getTraceAsString());
            return response()->json(['error' => 'Terjadi kesalahan saat memuat data'], 500);
        }
    }
}
