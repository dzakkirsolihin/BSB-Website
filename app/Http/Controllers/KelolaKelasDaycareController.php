<?php

namespace App\Http\Controllers;

use App\Models\MuridDaycare;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Kelas;

class KelolaKelasDaycareController extends Controller
{
    public function kelolaKelasDaycare()
    {
        $dataMuridDaycare = MuridDaycare::where('kelas_id', 1)->get();
        $dataKelas = Kelas::all();
        return view('presensi.admin.kelola-kelas-daycare', compact('dataMuridDaycare'));
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
            $murid = MuridDaycare::where('no_induk', $no_induk)->firstOrFail();
            
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

    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_induk' => 'required|unique:murid_daycare,no_induk',
            'nama_siswa' => 'required',
            'jk' => 'required|in:L,P',
            'no_telp_orang_tua' => 'required',
            'alamat' => 'required',
            'kelas_id' => 'required|in:1'
        ]);

        try {
            MuridDaycare::create($validated);
            return redirect()->back()->with('success', 'Data siswa daycare berhasil ditambahkan');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withErrors(['no_induk' => 'Murid dengan nomor induk ' . $request->no_induk . ' sudah terdaftar.']);
        }
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'no_induk' => 'required',
            'nama_siswa' => 'required',
            'jk' => 'required|in:L,P',
            'no_telp_orang_tua' => 'required',
            'alamat' => 'required',
            'kelas_id' => 'required|in:1'
        ]);

        $murid = MuridDaycare::findOrFail($id);
        $murid->update($validated);

        return redirect()->back()->with('success', 'Data murid berhasil diperbarui');
    }
}
