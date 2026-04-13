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
        Schema::create('asets', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('kode_aset');
            $table->foreignId('jenis_aset_id');
            $table->foreignId('kondisi_id');
            $table->foreignId('user_id');
            $table->foreignId('kantor_id')->nullable();            
            $table->string('nama_aset')->nullable();
            $table->string('merk')->nullable();
            $table->string('model')->nullable();
            $table->string('serial_number')->nullable();
            $table->text('spesifikasi')->nullable();            
            $table->text('no_polisi')->nullable();            
            $table->date('pajak_stnk')->nullable();            
            $table->date('pajak_bpkb')->nullable();            
            $table->date('kir')->nullable();            
            $table->string('divisi')->nullable();
            $table->date('tanggal_beli')->nullable();            
            $table->text('keterangan')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asets');
    }
};