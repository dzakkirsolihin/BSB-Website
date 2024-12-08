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
            'guru_id' => $guru->nip, // Tambahkan guru_id
            'no_telepon' => $guru->telp,
        ]);

        // Ambil data guru kedua (jika ada)
        $guru2 = Guru::find(2); // Ganti 2 dengan ID guru yang sesuai
        if ($guru2) {
            User::factory()->create([
                'name' => $guru2->nama_guru, // Ambil nama dari tabel guru
                'email' => 'guru@bsb.com',
                'password' => 'guru123',
                'role' => 'guru',
                'guru_id' => $guru2->nip, // Tambahkan guru_id
                'no_telepon' => $guru2->telp,
            ]);
        }
    }
}
