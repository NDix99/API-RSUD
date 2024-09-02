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
        Schema::create('data_order', function (Blueprint $table) {
            $table->id(); // id INT PRIMARY KEY
            $table->string('HID', 255);
            $table->timestamp('tgl');
            $table->string('no_order', 255);
            $table->string('no_index1', 255)->nullable(); // DEFAULT NULL
            $table->string('no_index2', 255)->nullable(); // DEFAULT NULL
            $table->string('id_client');
            $table->string('token', 255);
            $table->string('status_order', 255);
            $table->string('status_pasien', 255);
            $table->string('golongan_pasien', 255);
            $table->string('pengirim_ruang', 255);
            $table->string('kamar', 255);
            $table->string('dokter_pengirim', 255);
            $table->text('diagnosa');
            $table->string('pcr', 255);
            $table->string('specimen', 255);
            $table->string('no_specimen', 255);
            $table->string('tgl_pengambilan_spec');
            $table->string('tgl_pengiriman_spec');
            $table->integer('sampleke');
            $table->string('faskes', 255);
            $table->string('faskes_provinsi', 255);
            $table->string('faskes_kota', 255);
            $table->string('faskes_ket', 255);
            $table->string('nama_lab', 255)->nullable();
            $table->timestamp('tgl_gejala')->nullable();
            $table->string('hasil_dikirim', 255);
            $table->string('dokter_pathologi', 255);
            $table->string('bahasa_cetak', 255);
            $table->decimal('jasa_rs', 10, 2)->default(0); // Assuming it's a financial field
            $table->decimal('jasa_konsul', 10, 2)->default(0); // Assuming it's a financial field
            $table->string('status', 255);
            $table->timestamps(); // Adds created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_order');
    }
};
