<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'pasien_id',
        'HID',
        'tgl',
        'no_order',
        'no_index1',
        'no_index2',
        'id_client',
        'token',
        'status_order',
        'status_pasien',
        'golongan_pasien',
        'pengirim_ruang',
        'kamar',
        'dokter_pengirim',
        'diagnosa',
        'pcr',
        'specimen',
        'no_specimen',
        'tgl_pengambilan_spec',
        'tgl_pengiriman_spec',
        'sampleke',
        'faskes',
        'faskes_provinsi',
        'faskes_kota',
        'faskes_ket',
        'nama_lab',
        'tgl_gejala',
        'hasil_dikirim',
        'dokter_pathologi',
        'bahasa_cetak',
        'jasa_rs',
        'jasa_konsul',
        'status',
        'update_date',
        'update_by',
        'alasan_batal',
        'tgl_cekin',
        'cekin_by',
        'tgl_selesai',
        'selesai_by',
        'tgl_validasi',
        'validasi_by',
        'validasi_status',
        'catatan',
        'cancel_by',
        'CreateBy',
        'cetak',
        'order_group',
        'urgent_cetak',
        'modul',
        'ruang',
        'status_pas',
        'dokter',
        'dokterpkx',
        'hiv_form'
    ];

    protected $casts = [
        'dokterpkx' => 'array',
        'catatan' => 'boolean',
        'hiv_form' => 'boolean'
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'pasien_id');
    }

    public function hasil()
    {
        return $this->hasMany(Hasil::class, 'order_id');
    }
}
