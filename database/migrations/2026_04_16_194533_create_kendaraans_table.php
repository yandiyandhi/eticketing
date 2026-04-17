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
        Schema::create('kendaraans', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('kode_service');
            $table->foreignId('aset_id');
            $table->string('kilometer_awal');
            $table->string('kilometer_akhir')->nullable();
            $table->date('tanggal_pengajuan');
            $table->date('tanggal_approve')->nullable();
            $table->date('tanggal_service')->nullable();
            $table->date('tanggal_selesai')->nullable();
            $table->string('keluhan')->nullable();
            $table->foreignId('diajukan_oleh')->nullable()->constrained('users');
            $table->foreignId('disetujui_oleh')->nullable()->constrained('users');
            $table->foreignId('ditolak_oleh')->nullable()->constrained('users');
            $table->foreignId('diketahui_oleh')->nullable()->constrained('users');
            $table->enum('status', ['diajukan', 'disetujui', 'ditolak', 'proses', 'selesai', 'batal']);
            $table->text('catatan')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kendaraans');
    }
};