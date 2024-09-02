<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'token_pasien',
        'tanggal',
        'no_ref',
        'no_rekam',
        'pasport',
        'no_bpjs',
        'sebutan',
        'nama_peserta',
        'jenis_kelamin',
        'tangal_lahir',
        'usia_tahun',
        'usia_bulan',
        'usia_hari',
        'usia_jam',
        'alamat',
        'no_hp',
        'email',
        'last_update',
        'update_by',
        'register_by',
        'log',
        'alamat_domisili',
        'rt',
        'rw',
        'kecamatan',
        'kelurahan',
        'kota',
        'provinsi',
        'kewarganegaraan',
        'kewarganegaraan_detail'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'pasien_id')->latest()->take(10);
    }

    public function ordersWithHasil()
    {
        return $this->orders()->with('hasil');
    }
}
