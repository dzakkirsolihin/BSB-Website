<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\PresensiGuru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PresensiGuruController extends Controller
{
    public function index()
    {
        $today = Carbon::now()->format('Y-m-d');
        $nip = Auth::user()->nip;

        $presensi = PresensiGuru::where('nip', $nip)
            ->whereDate('created_at', $today)
            ->first();

        $buttonType = 'masuk';
        $message = '';

        if ($presensi) {
            if ($presensi->status === 'done') {
                $message = 'Anda sudah melakukan presensi hari ini';
            } else {
                $buttonType = 'pulang';
            }
        }

        return view('presensi.guru.presensi-guru', compact('buttonType', 'message'));
    }

    public function store(Request $request)
    {
        try {
            $nip = Auth::user()->nip;
            $today = Carbon::now()->format('Y-m-d');

            // Decode base64 image
            $image = $request->image;
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $imageName = $nip . '_' . time() . '.png';

            // Save image to storage
            Storage::disk('public')->put('presensi/' . $imageName, base64_decode($image));

            // Create presensi record
            PresensiGuru::create([
                'nip' => $nip,
                'foto' => 'presensi/' . $imageName,
                'koordinat' => $request->koordinat,
                'jam_datang' => Carbon::now()->format('H:i:s'),
                'status_kehadiran' => $request->status_kehadiran,
                'keterangan' => $request->keterangan,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'status' => null
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Presensi berhasil disimpan'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request)
    {
        try {
            $nip = Auth::user()->nip;
            $today = Carbon::now()->format('Y-m-d');

            $presensi = PresensiGuru::where('nip', $nip)
                ->whereDate('created_at', $today)
                ->first();

            if (!$presensi) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Data presensi tidak ditemukan'
                ], 404);
            }

            $presensi->update([
                'jam_pulang' => Carbon::now()->format('H:i:s'),
                'status' => 'done',
                'status_kehadiran' => $request->status_kehadiran,
                'keterangan' => $request->keterangan,
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
}
