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
        Schema::create('tb_jadwal', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('pendaftar_id');
            $table->date('tanggal');
            $table->time('jam_pelatihan');
            $table->timestamps();
        
            $table->foreign('pendaftar_id')->references('id')->on('tb_pendaftar')->onUpdate('restrict')->onDelete('restrict');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal');
    }
};
