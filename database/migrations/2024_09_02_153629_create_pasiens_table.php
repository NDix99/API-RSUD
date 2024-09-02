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
        Schema::create('pasiens', function (Blueprint $table) {
            $table->id();
            $table->string('token_pasien')->nullable();
            $table->timestamp('tanggal')->nullable();
            $table->string('no_ref')->nullable();
            $table->string('no_rekam')->nullable();
            $table->string('pasport')->nullable();
            $table->string('no_bpjs')->nullable();
            $table->string('sebutan')->nullable();
            $table->string('nama_peserta')->nullable();
            $table->integer('jenis_kelamin')->nullable();
            $table->date('tangal_lahir')->nullable();
            $table->integer('usia_tahun')->nullable();
            $table->integer('usia_bulan')->nullable();
            $table->integer('usia_hari')->nullable();
            $table->string('usia_jam')->nullable();
            $table->string('alamat')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('email')->nullable();
            $table->timestamp('last_update')->nullable();
            $table->string('update_by')->nullable();
            $table->string('register_by')->nullable();
            $table->string('log')->nullable();
            $table->string('alamat_domisili')->nullable();
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('kota')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kewarganegaraan')->nullable();
            $table->string('kewarganegaraan_detail')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasiens');
    }
};
