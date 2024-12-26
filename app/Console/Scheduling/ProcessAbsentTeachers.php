<?php

namespace App\Console\Scheduling;

use App\Models\PresensiGuru;
use App\Models\Guru;
use Carbon\Carbon;
use Illuminate\Console\Command;

class ProcessAbsentTeachers extends Command
{
    protected $signature = 'attendance:process-absent';
    protected $description = 'Process absent teachers and mark them as Alpha';

    public function handle(): void
    {
        $yesterday = Carbon::yesterday()->format('Y-m-d');
        
        // Get all teachers
        $guru = Guru::all();
        $count = 0;
        
        foreach ($guru as $g) {
            // Check if teacher has any attendance record for yesterday
            $attendance = PresensiGuru::where('nip', $g->nip)
                ->whereDate('created_at', $yesterday)
                ->first();
                
            if (!$attendance) {
                // Create Alpha record
                PresensiGuru::create([
                    'nip' => $g->nip,
                    'status_kehadiran' => 'Alpha',
                    'created_at' => Carbon::yesterday(),
                    'updated_at' => Carbon::yesterday()
                ]);

                $count++;
                $this->info("Created Alpha record for NIP: {$g->nip}");
            }
        }
        
        $this->info("Processed {$count} absent teachers successfully");
    }

    public function schedule(): string
    {
        return '1 0 * * *'; // Runs at 00:01 daily
    }
}