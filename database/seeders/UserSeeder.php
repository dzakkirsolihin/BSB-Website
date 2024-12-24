<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Guru;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil data guru pertama
        $guru = Guru::first();

        User::factory()->create([
            'name' => $guru->nama_guru, // Ambil nama dari tabel guru
            'email' => 'admin@bsb.com',
            'password' => 'admin123',
            'role' => 'admin',
            'nip' => $guru->nip, // Tambahkan nip
            'no_telepon' => $guru->telp,
        ]);

        // Ambil data guru kedua (jika ada)
        $guru2 = Guru::find(2); // Ganti 2 dengan ID guru yang sesuai
        if ($guru2) {
            User::factory()->create([
                'name' => $guru2->nama_guru, // Ambil nama dari tabel guru
                'email' => 'guru@bsb.com',
                'password' => 'guru1234',
                'role' => 'guru',
                'nip' => $guru2->nip, // Tambahkan nip
                'no_telepon' => $guru2->telp,
            ]);
        }

        $gurus = Guru::all();

        foreach ($gurus as $guruss) {
            // Periksa apakah pengguna dengan NIP yang sama sudah ada
            if (!User::where('nip', $guruss->nip)->exists()) {
                User::factory()->create([
                    'name' => $guruss->nama_guru,
                    'email' => $guruss->nip . '@bsb.com', // Buat email unik
                    'password' => bcrypt('password'), // Tetapkan kata sandi default (Anda mungkin ingin mengubahnya)
                    'role' => 'guru', // Tetapkan peran sebagai 'guru'
                    'nip' => $guruss->nip,
                    'no_telepon' => $guruss->telp,
                ]);
            }
        }
    }
}
