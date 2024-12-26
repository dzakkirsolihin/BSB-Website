<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('murid_tk_bestari', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_induk', 5)->unique();;
            $table->string('nis', 30)->nullable();
            $table->string('nama_siswa', 50);
            $table->enum('jk', ['L', 'P']);
            $table->string('no_telp_orang_tua', 15)->nullable();
            $table->string('alamat')->nullable();
            $table->unsignedBigInteger('kelas_id'); // Ubah menjadi unsignedBigInteger
            $table->foreign('kelas_id')->references('id')->on('kelas');
            $table->timestamps();
            // $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('murid_tk_bestari');
    }
};
