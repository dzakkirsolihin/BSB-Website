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
        Schema::create('murid_daycare', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_induk', 5)->unique();
            $table->string('nama_siswa', 50);
            $table->enum('jk', ['L', 'P']);
            $table->string('no_telp_orang_tua', 15)->nullable();
            $table->string('alamat')->nullable();
            $table->unsignedBigInteger('kelas_id'); // Ubah menjadi unsignedBigInteger
            $table->foreign('kelas_id')->references('id')->on('kelas');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('murid_daycare');
    }
};
