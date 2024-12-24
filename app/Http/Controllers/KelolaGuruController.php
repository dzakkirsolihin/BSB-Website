<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Guru;
use App\Models\Kelas;

class KelolaGuruController extends Controller
{
    public function index()
    {
        $dataGuru = Guru::with('kelas')->get();
        $dataKelas = Kelas::all();
        return view('presensi.admin.kelola-guru', compact('dataGuru', 'dataKelas'));
    }

    public function update(Request $request, $nip)
    {
        $request->validate([
            'nama_guru' => 'required|string|max:50',
            'nip' => 'required|string|max:20',
            'email' => 'required|email',
            'password' => 'nullable|string|min:8', // Password baru opsional
            'telp' => 'required|string|max:15',
            'alamat' => 'required|string',
            'jk' => 'required|in:L,P',
            'kelas_id' => 'nullable|exists:kelas,id' // Allow null value for kelas_id
        ]);

        $guru = Guru::where('nip', $nip)->firstOrFail();

        // Cek apakah password baru diisi
        if ($request->filled('password')) {
            // Validasi password sesi admin
            $request->validate([
                'admin_password' => 'required|string|min:8',
            ]);

            // Cek apakah password sesi admin benar
            if (!Hash::check($request->admin_password, Auth::user()->password)) {
                return redirect()->back()->withErrors(['admin_password' => 'Password admin tidak benar.']);
            }
        }

        // Update guru data
        $guru->update([
            'nama_guru' => $request->nama_guru,
            'nip' => $request->nip,
            'telp' => $request->telp,
            'alamat' => $request->alamat,
            'jk' => $request->jk,
            'kelas_id' => $request->kelas_id // This can now be null
        ]);

        // Update related user data
        if ($guru->user) {
            $userData = [
                'email' => $request->email,
            ];

            // Check if password is provided
            if ($request->filled('password')) {
                $userData['password'] = bcrypt($request->password); // Hash the new password
            }

            $guru->user->update($userData);
        }

        // Set flash message
        return redirect()->back()->with('success', 'Data guru berhasil diperbarui');
    }

    public function destroy(Request $request, $nip)
    {
        $guru = Guru::where('nip', $nip)->firstOrFail();

        // Cek apakah guru memiliki role 'Admin'
        if ($guru->user->role === 'Admin') {
            return redirect()->back()->withErrors(['role' => 'Akun dengan role Admin tidak dapat dihapus.']);
        }

        $request->validate([
            'old_password' => 'required|string|min:8',
        ]);

        if (!Hash::check($request->old_password, $guru->user->password)) {
            return redirect()->back()->withErrors(['old_password' => 'Password lama salah.']);
        }

        $guru->delete();
        return redirect()->back()->with('success', 'Data guru berhasil dihapus');
    }
}
