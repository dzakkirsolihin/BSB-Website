<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Guru;
use App\Models\PresensiGuru;
use Carbon\Carbon;

class ProcessAbsentTeachers extends Command
{
    protected $signature = 'attendance:process-absent';
    protected $description = 'Process absent teachers and mark them as Alpha';

    public function handle()
    {
        $yesterday = Carbon::yesterday()->format('Y-m-d');
        
        // Get all teachers
        $guru = Guru::all();
        
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
            }
        }
        
        $this->info('Absent teachers processed successfully');
    }
}
