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
        Schema::create('data_hasil', function (Blueprint $table) {
            $table->id();
            $table->timestamp('create_date');
            $table->integer('ido');
            $table->integer('idi');
            $table->integer('idh')->nullable();
            $table->boolean('cekin_status');
            $table->boolean('validasi_status');
            $table->text('hasil')->nullable();
            $table->boolean('status');
            $table->dateTime('tanggal_cekin');
            $table->dateTime('tanggal_hasil')->nullable();
            $table->dateTime('tanggal_validasi')->nullable();
            $table->dateTime('tanggal_selesai')->nullable();
            $table->string('cekin_oleh', 255);
            $table->string('validasi_oleh', 255)->nullable();
            $table->string('hasil_oleh', 255)->nullable();
            $table->string('selesai_oleh', 255)->nullable();
            $table->string('statusx', 50)->nullable();
            $table->string('kode_alat', 50)->nullable();
            $table->text('history')->nullable();
            $table->text('has_ket')->nullable();
            $table->text('nilnor')->nullable();
            $table->string('flag', 50)->nullable();
            $table->text('kritis')->nullable();
            $table->integer('urut')->nullable();
            $table->integer('iid')->nullable();
            $table->string('KatId', 50)->nullable();
            $table->string('IdTest', 50)->nullable();
            $table->string('IdSub', 50)->nullable();
            $table->string('IdPrs', 50)->nullable();
            $table->string('IdGrp', 50)->nullable();
            $table->string('SeqNo', 50)->nullable();
            $table->integer('LvTest')->nullable();
            $table->string('StJdl', 255)->nullable();
            $table->boolean('cek_order');
            $table->string('nilKritis', 50)->nullable();
            $table->string('NmTestInd', 255)->nullable();
            $table->string('NmTestEng', 255)->nullable();
            $table->string('NmTeshCh', 255)->nullable();
            $table->string('opt', 50)->nullable();
            $table->string('metode', 255)->nullable();
            $table->string('UnitTest', 50)->nullable();
            $table->text('InpMask')->nullable();
            $table->string('StCetak', 50)->nullable();
            $table->string('JnInput', 50)->nullable();
            $table->string('desimal', 50)->nullable();
            $table->text('JnHasil')->nullable();
            $table->string('NmSampel', 50)->nullable();
            $table->string('KdMap', 50)->nullable();
            $table->text('NilDef')->nullable();
            $table->dateTime('UpdateDate')->nullable();
            $table->string('createBy', 255)->nullable();
            $table->string('updateBy', 255)->nullable();
            $table->integer('tat')->nullable();
            $table->decimal('harga', 10, 2)->nullable();
            $table->text('autocomment')->nullable();
            $table->text('keterangan')->nullable();
            $table->boolean('walapNilKritis')->nullable();
            $table->text('formula')->nullable();
            $table->string('refer', 50)->nullable();
            $table->string('flagx', 50)->nullable();
            $table->string('namatest', 255)->nullable();
            $table->boolean('statuscek')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_hasil');
    }
};
