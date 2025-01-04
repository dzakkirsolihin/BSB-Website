<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('presensi_murid_daycare', function (Blueprint $table) {
            $table->id();
            $table->string('no_induk', 5);
            $table->foreign('no_induk')->references('no_induk')->on('murid_daycare');
            $table->date('tanggal');
            $table->time('waktu_datang')->nullable();
            $table->time('waktu_pulang')->nullable();
            $table->enum('pengantar', ['ayah', 'ibu', 'keluarga'])->nullable();
            $table->string('detail_pengantar')->nullable();
            $table->enum('penjemput', ['ayah', 'ibu', 'keluarga'])->nullable();
            $table->string('detail_penjemput')->nullable();
            $table->enum('status_kehadiran', ['hadir', 'tidak_hadir'])->default('tidak_hadir');
            $table->timestamps();

            // Composite unique key untuk memastikan satu murid hanya memiliki satu presensi per hari
            $table->unique(['no_induk', 'tanggal']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presensi_murid_daycare');
    }
};
