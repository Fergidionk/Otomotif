<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tb_siswa', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_siswa', 100);
            $table->string('alamat_siswa', 255);
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('tempat_lahir', 20);
            $table->date('tanggal_lahir');
            $table->string('no_hp', 50);
            $table->enum('pendidikan_terakhir', ['TidakBersekolah', 'SD', 'SMP', 'SMA', 'PerguruanTinggi']);
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};
