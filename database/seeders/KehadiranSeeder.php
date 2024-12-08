<?php

namespace Database\Seeders;

use App\Models\Kehadiran;
use Illuminate\Database\Seeder;

class KehadiranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Kehadiran::create([
            'id' => 1,
            'ket' => 'Hadir',
            'color' => '3C0',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        Kehadiran::create([
            'id' => 2,
            'ket' => 'Izin',
            'color' => '0CF',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        Kehadiran::create([
            'id' => 3,
            'ket' => 'Bertugas Keluar',
            'color' => 'F90',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        Kehadiran::create([
            'id' => 4,
            'ket' => 'Sakit',
            'color' => 'FF0',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        Kehadiran::create([
            'id' => 5,
            'ket' => 'Terlambat',
            'color' => '7F0',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        Kehadiran::create([
            'id' => 6,
            'ket' => 'Tanpa Keterangan',
            'color' => 'F00',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
