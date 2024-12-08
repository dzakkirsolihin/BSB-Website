<?php

namespace Database\Seeders;

use App\Models\Guru;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Guru::create([
            'nip' => '199006202015015',
            'nama_guru' => 'Ade Suparman',
            'jk' => 'L',
            'telp' => '081234567894',
            'alamat' => 'Bandung',
        ]);
        Guru::create([
            'nip' => '198010202008013',
            'nama_guru' => 'Ema Kusmiati',
            'jk' => 'P',
            'telp' => '081234567892',
            'alamat' => 'Bandung',
        ]);
    }
}
