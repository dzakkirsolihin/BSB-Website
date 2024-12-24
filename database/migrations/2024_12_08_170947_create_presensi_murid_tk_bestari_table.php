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
        Schema::create('presensi_murid_tk_bestari', function (Blueprint $table) {
            $table->id();
            $table->string('no_induk');
            $table->enum('kehadiran', ['H', '-']);
            $table->text('keterangan')->nullable();
            $table->timestamps();
            $table->foreign('no_induk')->references('no_induk')->on('murid_tk_bestari')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presensi_murid_tk_bestari');
    }
};
