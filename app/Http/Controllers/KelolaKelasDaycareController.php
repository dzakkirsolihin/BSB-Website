<?php

namespace App\Http\Controllers;

use App\Models\MuridDaycare;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class KelolaKelasDaycareController extends Controller
{
    public function kelolaKelasDaycare()
    {
        $dataMuridDaycare = MuridDaycare::where('kelas_id', 1)->get();
        return view('presensi.admin.kelola-kelas-daycare', compact('dataMuridDaycare'));
    }

    public function destroy(Request $request, $nis)
    {
        $murid = MuridDaycare::where('nis', $nis)->firstOrFail();

        if (!Hash::check($request->admin_password, Auth::user()->password)) {
            return redirect()->back()->withErrors(['admin_password' => 'Password admin salah.']);
        }

        $murid->delete();
        return redirect()->back()->with('success', 'Data Murid berhasil dihapus');
    }

    public function destroyAll(Request $request, $kelas_id)
    {
        $murids = MuridDaycare::where('kelas_id', $kelas_id)->get();

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
