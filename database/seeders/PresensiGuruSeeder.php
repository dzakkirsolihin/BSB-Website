<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PresensiGuru;
use Carbon\Carbon;

class PresensiGuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Contoh NIP guru
        $nip = '198010202008013'; 

        // Generate data untuk 3 bulan terakhir
        for ($i = 0; $i < 90; $i++) {
            $date = Carbon::now()->subDays($i);
            
            // Skip hari Minggu
            if ($date->dayOfWeek === Carbon::SUNDAY) {
                continue;
            }

            $status = $this->getRandomStatus();
            
            PresensiGuru::create([
                'nip' => $nip,
                'jam_datang' => $status === 'Hadir' ? '07:' . rand(0, 59) . ':' . rand(0, 59) : null,
                'jam_pulang' => $status === 'Hadir' ? '16:' . rand(0, 59) . ':' . rand(0, 59) : null,
                'status_kehadiran' => $status,
                'keterangan' => $status !== 'Hadir' ? 'Keterangan ' . $status : null,
                'created_at' => $date,
                'updated_at' => $date
            ]);
        }
    }

    private function getRandomStatus()
    {
        $statuses = ['Hadir', 'Izin', 'Sakit'];
        $weights = [85, 8, 7]; // 85% Hadir, 8% Izin, 7% Sakit
        
        return $this->weightedRandom($statuses, $weights);
    }

    private function weightedRandom($items, $weights)
    {
        $total = array_sum($weights);
        $rand = mt_rand(1, $total);
        
        foreach ($items as $key => $item) {
            $rand -= $weights[$key];
            if ($rand <= 0) {
                return $item;
            }
        }
    }
}
