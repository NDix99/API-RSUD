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
        Schema::create('data_pasien', function (Blueprint $table) {
            $table->id(); // id
            $table->string('token_pasien');
            $table->timestamp('tanggal');
            $table->string('no_ref')->nullable();
            $table->string('no_rekam');
            $table->string('pasport')->nullable();
            $table->string('no_bpjs')->nullable();
            $table->string('sebutan');
            $table->string('nama_peserta');
            $table->char('jenis_kelamin', 1);
            $table->date('tanggal_lahir');
            $table->integer('usia_tahun');
            $table->integer('usia_bulan');
            $table->integer('usia_hari');
            $table->string('usia_jam')->nullable();
            $table->text('alamat');
            $table->string('no_hp')->nullable();
            $table->string('email')->nullable();
            $table->string('last_update');
            $table->string('update_by');
            $table->string('register_by');
            $table->text('log')->nullable();
            $table->text('alamat_domisili')->nullable();
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('kota')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kewarganegaraan')->nullable();
            $table->text('kewarganegaraan_detail')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_pasien');
    }
};
