<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kelas::create([
            'nama_kelas' => 'Daycare',
            'is_daycare' => true,
            'is_tk' => false,
        ]);

        // Data untuk kelas TK
        Kelas::create([
            'nama_kelas' => 'TK_A',
            'is_daycare' => false,
            'is_tk' => true,
        ]);
        Kelas::create([
            'nama_kelas' => 'TK_B',
            'is_daycare' => false,
            'is_tk' => true,
        ]);
        Kelas::create([
            'nama_kelas' => 'Bestari',
            'is_daycare' => false,
            'is_tk' => true,
        ]);
    }
}
