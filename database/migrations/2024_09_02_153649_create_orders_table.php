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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pasien_id')->nullable();
            $table->string('HID')->nullable();
            $table->timestamp('tgl')->nullable();
            $table->string('no_order')->nullable();
            $table->string('no_index1')->nullable();
            $table->string('no_index2')->nullable();
            $table->unsignedBigInteger('id_client')->nullable();
            $table->string('token')->nullable();
            $table->integer('status_order')->nullable();
            $table->integer('status_pasien')->nullable();
            $table->string('golongan_pasien')->nullable();
            $table->string('pengirim_ruang')->nullable();
            $table->string('kamar')->nullable();
            $table->string('dokter_pengirim')->nullable();
            $table->string('diagnosa')->nullable();
            $table->boolean('pcr')->nullable();
            $table->string('specimen')->nullable();
            $table->string('no_specimen')->nullable();
            $table->timestamp('tgl_pengambilan_spec')->nullable();
            $table->timestamp('tgl_pengiriman_spec')->nullable();
            $table->string('sampleke')->nullable();
            $table->string('faskes')->nullable();
            $table->string('faskes_provinsi')->nullable();
            $table->string('faskes_kota')->nullable();
            $table->string('faskes_ket')->nullable();
            $table->string('nama_lab')->nullable();
            $table->timestamp('tgl_gejala')->nullable();
            $table->string('hasil_dikirim')->nullable();
            $table->string('dokter_pathologi')->nullable();
            $table->string('bahasa_cetak')->nullable();
            $table->integer('jasa_rs')->nullable();
            $table->integer('jasa_konsul')->nullable();
            $table->string('status')->nullable();
            $table->timestamp('update_date')->nullable();
            $table->string('update_by')->nullable();
            $table->string('alasan_batal')->nullable();
            $table->timestamp('tgl_cekin')->nullable();
            $table->string('cekin_by')->nullable();
            $table->timestamp('tgl_selesai')->nullable();
            $table->string('selesai_by')->nullable();
            $table->timestamp('tgl_validasi')->nullable();
            $table->string('validasi_by')->nullable();
            $table->integer('validasi_status')->nullable();
            $table->boolean('catatan')->nullable();
            $table->string('cancel_by')->nullable();
            $table->string('CreateBy')->nullable();
            $table->string('cetak')->nullable();
            $table->string('order_group')->nullable();
            $table->boolean('urgent_cetak')->nullable();
            $table->boolean('modul')->nullable();
            $table->string('ruang')->nullable();
            $table->string('status_pas')->nullable();
            $table->string('dokter')->nullable();
            $table->json('dokterpkx')->nullable();
            $table->boolean('hiv_form')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
