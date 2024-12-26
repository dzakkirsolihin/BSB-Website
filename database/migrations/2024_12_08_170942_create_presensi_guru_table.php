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
            $table->string('foto')->nullable(); // Optional now since absent teachers won't have photos
            $table->string('koordinat')->nullable(); // Optional for the same reason
            $table->time('jam_datang')->nullable(); // Optional for absent teachers
            $table->time('jam_pulang')->nullable();
            $table->enum('status_kehadiran', ['Hadir', 'Izin', 'Sakit', 'Alpa']);
            $table->text('keterangan')->nullable();
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->timestamps();
            // $table->foreign('nip')->references('nip')->on('guru')->onDelete('cascade');
            // Add index for better query performance
            $table->index('nip');
            $table->index('created_at');
            
            // Foreign key with additional constraints
            $table->foreign('nip')
                ->references('nip')
                ->on('guru')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
