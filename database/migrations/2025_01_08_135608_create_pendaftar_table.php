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
        Schema::create('tb_pendaftar', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('siswa_id');
            $table->date('tanggal_daftar');
            $table->unsignedBigInteger('paket_id');
            $table->enum('metode_pembayaran', ['UangTunai', 'Transfer']);
            $table->enum('status_pembayaran', ['SudahDIbayar', 'BelumDibayar']);
            $table->timestamps();

            $table->foreign('siswa_id')->references('id')->on('tb_siswa')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign('paket_id')->references('id')->on('tb_paket')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftar');
    }
};
