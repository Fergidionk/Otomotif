<?php

use App\Enums\StatusKehadiran;
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
        Schema::create('tb_absensi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jadwal_id')->constrained('tb_jadwal')->onDelete('restrict');
            $table->foreignId('pendaftar_id')->constrained('tb_pendaftar')->onDelete('restrict');
            $table->string('hadir')->default(StatusKehadiran::TIDAK_HADIR->value);
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_absensi');
    }
};
