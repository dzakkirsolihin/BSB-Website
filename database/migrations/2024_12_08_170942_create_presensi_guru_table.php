<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresensiGuruTable extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('presensi_guru', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nip');
            $table->string('foto'); // Foto bukti kehadiran
            $table->string('koordinat'); // Koordinat lokasi
            $table->time('jam_datang'); // Jam datang
            $table->time('jam_pulang')->nullable(); // Jam pulang
            $table->enum('status_kehadiran', ['Hadir', 'Izin', 'Sakit', 'Alpha']); // Status kehadiran
            $table->string('status')->nullable(); // Kolom status baru
            $table->text('keterangan')->nullable();
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 11, 8);
            $table->timestamps();
            $table->foreign('nip')->references('nip')->on('guru')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('presensi_guru');
    }
};
