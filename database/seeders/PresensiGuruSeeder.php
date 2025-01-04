<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Guru;
use App\Models\PresensiGuru;
use Illuminate\Database\Seeder;

class PresensiGuruSeeder extends Seeder
{
    public function run(): void
    {
        // Get all guru NIP
        $guruNips = Guru::pluck('nip'); // Get all NIPs

        // Generate data untuk 3 bulan terakhir
        foreach ($guruNips as $nip) {
            for ($i = 0; $i < 90; $i++) {
                $date = Carbon::now()->subDays($i);

                // Skip weekend
                if ($date->isWeekend()) {
                    continue;
                }

                // Generate random status dengan probabilitas yang lebih realistis
                $status = $this->getRandomStatus();

                // Generate waktu datang antara 06:30 - 07:30
                $jamDatang = $date->copy()->setTime(rand(6, 7), rand(30, 59), rand(0, 59));

                // Generate waktu pulang antara 15:30 - 16:30
                $jamPulang = $date->copy()->setTime(rand(15, 16), rand(30, 59), rand(0, 59));

                // Generate keterangan yang lebih spesifik
                $keterangan = $this->getKeterangan($status);

                if ($date->lte(Carbon::now())) {
                    PresensiGuru::create([
                        'nip' => $nip,
                        'jam_datang' => $jamDatang,
                        'jam_pulang' => $jamPulang,
                        'status_kehadiran' => $status,
                        'keterangan' => $keterangan,
                        'koordinat' => $status === 'Hadir' ?
                            "S-6." . rand(100000, 999999) . ", E-106." . rand(100000, 999999) : null,
                        'foto' => $status === 'Hadir' ?
                            'presensi/dummy-' . rand(1, 5) . '.jpg' : null,
                        'created_at' => $date,
                        'updated_at' => $date
                    ]);
                }
            }
        }
    }

    private function getRandomStatus()
    {
        // Probabilitas yang lebih realistis:
        // 85% Hadir
        // 8% Izin
        // 7% Sakit
        $rand = rand(1, 100);

        if ($rand <= 85) {
            return 'Hadir';
        } elseif ($rand <= 93) {
            return 'Izin';
        } else {
            return 'Sakit';
        }
    }

    private function getKeterangan($status)
    {
        if ($status === 'Hadir') {
            return null;
        }

        if ($status === 'Sakit') {
            $alasanSakit = [
                'Demam', 'Flu', 'Sakit Kepala',
                'Sakit Perut', 'Check Up Dokter', 'Kurang Enak Badan'
            ];
            return $alasanSakit[array_rand($alasanSakit)];
        }

        if ($status === 'Izin') {
            $alasanIzin = [
                'Urusan Keluarga', 'Acara Keluarga',
                'Keperluan Pribadi', 'Mengurus Surat di Instansi',
                'Menghadiri Undangan', 'Mengurus Anak Sakit'
            ];
            return $alasanIzin[array_rand($alasanIzin)];
        }

        return null;
    }
}
