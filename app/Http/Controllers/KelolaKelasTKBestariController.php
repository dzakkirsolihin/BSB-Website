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

    public function destroy(Request $request, $no_induk)
    {
        // Validasi password admin
        $request->validate([
            'admin_password' => 'required|string|min:8',
        ]);

        // Cek apakah password admin benar
        if (!Hash::check($request->admin_password, Auth::user()->password)) {
            return redirect()->back()->withErrors(['admin_password' => 'Password admin salah.']);
        }

        try {
            // Temukan murid berdasarkan no_induk
            $murid = MuridTKBestari::where('no_induk', $no_induk)->firstOrFail();
            
            // Hapus murid
            $murid->delete();

            return redirect()->back()->with('success', 'Data Murid berhasil dihapus');
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat menghapus data murid.']);
        }
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

    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_induk' => 'required|unique:murid_tk_bestari,no_induk',
            'nis' => 'required|unique:murid_tk_bestari,nis',
            'nama_siswa' => 'required',
            'jk' => 'required|in:L,P',
            'no_telp_orang_tua' => 'required',
            'alamat' => 'required',
            'kelas_id' => 'required|in:2,3,4'
        ]);

        try {
            MuridTKBestari::create($validated);
            return redirect()->back()->with('success', 'Data Murid TK berhasil ditambahkan');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withErrors(['nis' => 'Murid dengan nomor NIS ' . $request->nis . ' sudah terdaftar.']);
        }
    }

    public function update(Request $request, $nis)
    {
        $validated = $request->validate([
            'no_induk' => 'required',
            'nis' => 'required',
            'nama_siswa' => 'required',
            'jk' => 'required|in:L,P',
            'no_telp_orang_tua' => 'required',
            'alamat' => 'required',
            'kelas_id' => 'required|in:2,3,4'
        ]);

        $murid = MuridTKBestari::where('nis', $nis)->firstOrFail();
        $murid->update($validated);

        return redirect()->back()->with('success', 'Data murid berhasil diperbarui');
    }
}
