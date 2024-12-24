<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\support\Facades\Auth;
use App\Models\MuridTKBestari;

class KelolaKelasTKBestariController extends Controller
{
    public function kelolaKelasTkA()
    {
        $dataMuridTkA = MuridTKBestari::where('kelas_id', 2)->get();
        return view('presensi.admin.kelola-kelas-tk-a', compact('dataMuridTkA'));
    }
    public function kelolaKelasTkB()
    {
        $dataMuridTkB = MuridTKBestari::where('kelas_id', 3)->get();
        return view('presensi.admin.kelola-kelas-tk-b', compact('dataMuridTkB'));
    }
    public function kelolaKelasBestari()
    {
        $dataMuridBestari = MuridTKBestari::where('kelas_id', 4)->get();
        return view('presensi.admin.kelola-kelas-bestari', compact('dataMuridBestari'));
    }
    public function destroy(Request $request, $nis)
    {
        $murid = MuridTKBestari::where('nis', $nis)->firstOrFail();

        if (!Hash::check($request->admin_password, Auth::user()->password)) {
            return redirect()->back()->withErrors(['admin_password' => 'Password admin salah.']);
        }

        $murid->delete();
        return redirect()->back()->with('success', 'Data Murid berhasil dihapus');
    }

    public function destroyAll(Request $request, $kelas_id)
    {
        $murids = MuridTKBestari::where('kelas_id', $kelas_id)->get();

        if (!Hash::check($request->admin_password, Auth::user()->password)) {
            return redirect()->back()->withErrors(['admin_password' => 'Password admin salah.']);
        }

                // Menghapus semua murid yang ditemukan
        foreach ($murids as $murid) {
            $murid->delete();
        }
        return redirect()->back()->with('success', 'Semua Data Murid berhasil dihapus');
    }
}
