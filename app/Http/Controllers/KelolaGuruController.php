<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\User;

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
            'password' => 'nullable|string|min:8',
            'telp' => 'required|string|max:15',
            'alamat' => 'required|string',
            'jk' => 'required|in:L,P',
            'kelas_id' => 'nullable|exists:kelas,id'
        ]);

        $guru = Guru::where('nip', $nip)->firstOrFail();

        if ($request->filled('password')) {
            $request->validate([
                'admin_password' => 'required|string|min:8',
            ]);

            if (!Hash::check($request->admin_password, Auth::user()->password)) {
                return redirect()->back()->withErrors(['admin_password' => 'Password admin tidak benar.']);
            }
        }

        try {
            DB::beginTransaction();

            // Jika NIP berubah, kita perlu melakukan update secara khusus
            if ($guru->nip !== $request->nip) {
                // 1. Hapus relasi foreign key sementara
                DB::statement('SET FOREIGN_KEY_CHECKS=0;');
                
                // 2. Update user terlebih dahulu
                if ($guru->user) {
                    $guru->user->update([
                        'name' => $request->nama_guru,
                        'email' => $request->email,
                        'no_telepon' => $request->telp,
                        'nip' => $request->nip
                    ]);
                }

                // 3. Update guru
                $guru->update([
                    'nama_guru' => $request->nama_guru,
                    'nip' => $request->nip,
                    'telp' => $request->telp,
                    'alamat' => $request->alamat,
                    'jk' => $request->jk,
                    'kelas_id' => $request->kelas_id
                ]);

                // 4. Aktifkan kembali foreign key checks
                DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            } else {
                // Update normal jika NIP tidak berubah
                if ($guru->user) {
                    $guru->user->update([
                        'name' => $request->nama_guru,
                        'email' => $request->email,
                        'no_telepon' => $request->telp
                    ]);
                }

                $guru->update([
                    'nama_guru' => $request->nama_guru,
                    'telp' => $request->telp,
                    'alamat' => $request->alamat,
                    'jk' => $request->jk,
                    'kelas_id' => $request->kelas_id
                ]);
            }

            // Update password jika ada
            if ($request->filled('password')) {
                $guru->user->update([
                    'password' => bcrypt($request->password)
                ]);
            }

            DB::commit();
            return redirect()->back()->with('success', 'Data guru berhasil diperbarui');

        } catch (\Exception $e) {
            DB::rollBack();
            DB::statement('SET FOREIGN_KEY_CHECKS=1;'); // Pastikan foreign key checks kembali aktif
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat memperbarui data.']);
        }
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'nip' => 'required|string|max:20',
            'admin_password' => 'required|string|min:8',
        ]);

        if (!Hash::check($request->admin_password, Auth::user()->password)) {
            return redirect()->back()->withErrors(['admin_password' => 'Password admin tidak benar.']);
        }

        try {
            DB::beginTransaction();

            $guru = Guru::where('nip', $request->nip)->firstOrFail();

            if ($guru->user && $guru->user->role === 'Admin') {
                return redirect()->back()->withErrors(['role' => 'Akun dengan role Admin tidak dapat dihapus.']);
            }

            // Hapus user terkait terlebih dahulu
            if ($guru->user) {
                $guru->user->delete();
            }

            // Hapus data guru
            $guru->delete();

            DB::commit();
            return redirect()->back()->with('success', 'Data guru berhasil dihapus');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat menghapus data.']);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_guru' => 'required|string|max:50',
            'nip' => 'required|string|max:20|unique:guru,nip',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'telp' => 'required|string|max:15',
            'alamat' => 'required|string',
            'jk' => 'required|in:L,P',
            'kelas_id' => 'nullable|exists:kelas,id'
        ]);

        try {
            DB::beginTransaction();

            // Buat data guru
            $guru = Guru::create([
                'nip' => $request->nip,
                'nama_guru' => $request->nama_guru,
                'jk' => $request->jk,
                'telp' => $request->telp,
                'alamat' => $request->alamat,
                'kelas_id' => $request->kelas_id
            ]);

            // Buat user account
            $guru->user()->create([
                'name' => $request->nama_guru,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => 'Guru',
                'nip' => $request->nip,
                'no_telepon' => $request->telp
            ]);

            DB::commit();
            return redirect()->back()->with('success', 'Data guru berhasil ditambahkan');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat menambah data.']);
        }
    }
}