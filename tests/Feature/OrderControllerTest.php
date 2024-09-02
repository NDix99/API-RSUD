<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Pasien;
use App\Models\Order;

class OrderControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_save_order_success()
    {
        $data = json_decode('{
    "dataOrder": {
        "id": "84",
        "HID": "",
        "tgl": "2024-08-27 16:54:33",
        "no_order": "20240810021",
        "no_index1": "",
        "no_index2": "",
        "id_client": "18123842",
        "token": "a67363ac79acf2f17d7b1d4f5a9badf7",
        "status_order": "2",
        "status_pasien": "1",
        "golongan_pasien": "",
        "pengirim_ruang": "81",
        "kamar": "",
        "dokter_pengirim": "D026",
        "diagnosa": "",
        "pcr": "0",
        "specimen": "",
        "no_specimen": "",
        "tgl_pengambilan_spec": "",
        "tgl_pengiriman_spec": "",
        "sampleke": "",
        "faskes": "",
        "faskes_provinsi": "",
        "faskes_kota": "",
        "faskes_ket": "",
        "nama_lab": "",
        "tgl_gejala": "",
        "hasil_dikirim": "RI",
        "dokter_pathologi": "D027",
        "bahasa_cetak": "id",
        "jasa_rs": "0",
        "jasa_konsul": "0",
        "status": "-",
        "update_date": "2024-08-27 16:57:30",
        "update_by": "",
        "alasan_batal": "",
        "tgl_cekin": "2024-08-27 16:57:30",
        "cekin_by": "Arda Nadia Kumalasari, ST",
        "tgl_selesai": "",
        "selesai_by": "",
        "tgl_validasi": "",
        "validasi_by": "",
        "validasi_status": "0",
        "catatan": false,
        "cancel_by": "",
        "CreateBy": "Arda Nadia Kumalasari, ST",
        "cetak": "",
        "order_group": "d01a1d296dc664bcb2d6230df238b3d6",
        "urgent_cetak": "0",
        "modul": "0",
        "ruang": "CEMARA",
        "status_pas": "Umum",
        "dokter": "dr. Pertiwi Rosanti, Sp.PD",
        "dokterpkx": {
            "dokter": "dr. Emy Noerwidayati,M.Sc.Sp.PK",
            "sip": ""
        },
        "hiv_form": false
    },
    "dataPasien": {
        "id": "83",
        "token_pasien": "295631338be81bf54e95f03ca1e70340",
        "tanggal": "2024-08-27 14:39:45",
        "no_ref": "",
        "no_rekam": "18123842",
        "pasport": null,
        "no_bpjs": "",
        "sebutan": "Tn",
        "nama_peserta": "MUNADI ",
        "jenis_kelamin": "0",
        "tangal_lahir": "1958-03-12",
        "usia_tahun": "66",
        "usia_bulan": "5",
        "usia_hari": "15",
        "usia_jam": "",
        "alamat": "SOGO 023\/005 BALEREJO SOGO, BALEREJO, KAB. MADIUN,",
        "no_hp": "",
        "email": null,
        "last_update": "2024-08-27 16:54:33",
        "update_by": "Arda Nadia Kumalasari, ST",
        "register_by": "Arda Nadia Kumalasari, ST",
        "log": null,
        "alamat_domisili": "",
        "rt": "",
        "rw": "",
        "kecamatan": "",
        "kelurahan": "",
        "kota": "",
        "provinsi": "",
        "kewarganegaraan": "WNI",
        "kewarganegaraan_detail": ""
    },
    "hasil": {
        "Hematology": {
            "Gambaran Darah Tepi": {
                "h": "h2",
                "test": {
                    "id": "100118",
                    "createDate": "2022-09-05 14:20:35",
                    "ido": "84",
                    "idi": "100118",
                    "idh": "",
                    "cekin_status": "1",
                    "validasi_status": "0",
                    "hasil": "",
                    "status": "0",
                    "tanggal_cekin": "2024-08-27 16:57:30",
                    "tanggal_hasil": "",
                    "tanggal_validasi": "",
                    "tanggal_selesai": "",
                    "cekin_oleh": "Arda Nadia Kumalasari, ST",
                    "validasi_oleh": null,
                    "hasil_oleh": null,
                    "selesai_oleh": null,
                    "statusx": "",
                    "kode_alat": null,
                    "history": "",
                    "has_ket": "",
                    "nilnor": "",
                    "flag": "",
                    "kritis": "",
                    "urut": "15",
                    "iid": null,
                    "KatId": "",
                    "IdTest": "0101015",
                    "IdSub": "0100000",
                    "IdPrs": null,
                    "IdGrp": null,
                    "SeqNo": null,
                    "LvTest": "1",
                    "StJdl": null,
                    "cek_order": "0",
                    "nilKritis": "",
                    "NmTestInd": "Gambaran Darah Tepi",
                    "NmTestEng": "Peripheral Blood Film",
                    "NmTeshCh": "????",
                    "opt": "",
                    "metode": "",
                    "UnitTest": "",
                    "InpMask": null,
                    "StCetak": "",
                    "JnInput": "number",
                    "desimal": "",
                    "JnHasil": null,
                    "NmSampel": "1",
                    "KdMap": "",
                    "NilDef": "",
                    "UpdateDate": "2022-09-05 16:14:14",
                    "createBy": null,
                    "updateBy": null,
                    "tat": "140",
                    "harga": "0",
                    "autocomment": "",
                    "keterangan": "",
                    "walapNilKritis": "0",
                    "formula": "",
                    "refer": "",
                    "flagx": "",
                    "namatest": "Gambaran Darah Tepi",
                    "statuscek": "0"
                }
            }
        }
    },
    "profile": {
        "nama": "RUMAH SAKIT UMUM DAERAH CARUBAN",
        "alamat": "Jl. A. Yani KM 2 Caruban 0351-383956",
        "telp": "",
        "email": "",
        "kota": "",
        "type_cetak": "1"
    },
    "cetakan": 1,
    "bahasa": "id",
    "tgl": "27 Agustus 2024",
    "tgl2": "2024-08-27",
    "nc_count": 1
}',true);

        $response = $this->postJson('/api/orders', $data);

        $response->assertStatus(200)
                 ->assertJsonStructure(['dataPasien', 'dataOrder', 'hasil']);

        $this->assertDatabaseHas('pasiens', ['id' => 1, 'nama' => 'John Doe']);
        $this->assertDatabaseHas('orders', ['no_order' => 'ORD123']);
    }

    public function test_save_order_validation_error()
    {
        $data = [
            'dataPasien' => [],
            'dataOrder' => [],
            'hasil' => [],
        ];

        $response = $this->postJson('/api/orders', $data);

        $response->assertStatus(422)
                 ->assertJsonStructure(['error']);
    }

    public function test_get_order_success()
    {
        $order = Order::factory()->create();

        $response = $this->getJson('/api/orders/' . $order->id);

        $response->assertStatus(200)
                 ->assertJsonStructure(['dataOrder']);
    }

    public function test_get_order_not_found()
    {
        $response = $this->getJson('/api/orders/999');

        $response->assertStatus(404)
                 ->assertJsonStructure(['error']);
    }

    public function test_update_order_success()
    {
        $order = Order::factory()->create();

        $data = [
            'no_order' => 'ORD456',
            'validasi_status' => 1,
        ];

        $response = $this->putJson('/api/orders/' . $order->id, $data);

        $response->assertStatus(200)
                 ->assertJsonStructure(['dataOrder']);

        $this->assertDatabaseHas('orders', ['no_order' => 'ORD456']);
    }

    public function test_delete_order_success()
    {
        $order = Order::factory()->create();

        $response = $this->deleteJson('/api/orders/' . $order->id);

        $response->assertStatus(204);
        $this->assertDatabaseMissing('orders', ['id' => $order->id]);
    }

    // Tambahkan test case lainnya sesuai kebutuhan
}
