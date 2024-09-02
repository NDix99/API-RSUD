<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Models\Pasien;
use App\Models\Order;
use App\Models\Hasil;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function save(Request $request)
    {
        DB::beginTransaction();

        try {
            $validatedData = $this->validateRequest($request);

            if ($this->isOrderNotValidated($validatedData['dataOrder'])) {
                return response()->json(['error' => 'Data order belum tervalidasi'], 422);
            }

            $pasien = $this->createOrUpdatePasien($validatedData['dataPasien']);
            $order = $this->createOrUpdateOrder($validatedData['dataOrder'], $pasien->id);

            if ($order->wasRecentlyCreated) {
                $this->saveHasil($order->id, $validatedData['hasil']);
            }

            DB::commit();

            return $this->buildResponse($pasien, $order);
        } catch (ValidationException $e) {
            DB::rollBack();
            return response()->json(['error' => $e->errors()], 422);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Terjadi kesalahan pada server', 'message' => $e->getMessage()], 500);
        }
    }

    private function validateRequest(Request $request)
    {
        return $request->validate([
            'dataPasien' => 'required|array',
            'dataOrder' => 'required|array',
            'hasil' => 'required|array',
        ]);
    }

    private function isOrderNotValidated(array $dataOrder)
    {
        return isset($dataOrder['validasi_status']) && $dataOrder['validasi_status'] != 1;
    }

    private function createOrUpdatePasien(array $dataPasien)
    {
        $dataPasien['id'] = (int) $dataPasien['id'];
        return Pasien::updateOrCreate(['id' => $dataPasien['id']], $dataPasien);
    }

    private function createOrUpdateOrder(array $dataOrder, $pasienId)
    {
        $dataOrder['pasien_id'] = $pasienId;
        return Order::updateOrCreate(['id' => $dataOrder['id']], $dataOrder);
    }

    private function saveHasil($orderId, array $hasil)
    {
        return Hasil::create([
            'order_id' => $orderId,
            'data' => json_encode($hasil)
        ]);
    }

    private function buildResponse($pasien, $order)
    {
        return response()->json([
            'dataPasien' => $pasien->wasRecentlyCreated ? 'berhasil membuat pasien baru' : 'data sudah ada',
            'dataOrder' => $order->wasRecentlyCreated ? 'berhasil membuat order baru' : 'data sudah ada',
            'hasil' => $order->wasRecentlyCreated ? 'sukses' : 'data sudah ada'
        ]);
    }

    public function getPaginatedPasiens(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $search = $request->input('search', '');

        $query = Pasien::with('ordersWithHasil');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nama_peserta', 'like', '%' . $search . '%')
                  ->orWhere('no_rekam', 'like', '%' . $search . '%')
                  ->orWhere('no_bpjs', 'like', '%' . $search . '%');
            });
        }

        return response()->json($query->paginate($perPage));
    }

    public function getPasienByNoRekam($noRekam)
    {
        if (!$noRekam) {
            return response()->json(['error' => 'no_rekam is required'], 400);
        }

        $pasien = Pasien::with('ordersWithHasil')
                        ->where('no_rekam', $noRekam)
                        ->first();

        if (!$pasien) {
            return response()->json(['error' => 'Pasien not found'], 404);
        }

        return response()->json($pasien);
    }

    public function getPaginatedOrders(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $search = $request->input('search', '');

        $query = Order::with(['pasien', 'hasil']);

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('no_order', 'like', '%' . $search . '%')
                  ->orWhere('HID', 'like', '%' . $search . '%')
                  ->orWhere('status', 'like', '%' . $search . '%')
                  ->orWhereHas('pasien', function ($q) use ($search) {
                      $q->where('nama_peserta', 'like', '%' . $search . '%')
                        ->orWhere('no_rekam', 'like', '%' . $search . '%');
                  });
            });
        }

        return response()->json($query->paginate($perPage));
    }

    public function getOrderByNoOrder($noOrder)
    {
        if (!$noOrder) {
            return response()->json(['error' => 'no_order is required'], 400);
        }

        $order = Order::with(['pasien', 'hasil'])
                      ->where('no_order', $noOrder)
                      ->first();

        if (!$order) {
            return response()->json(['error' => 'Order not found'], 404);
        }

        return response()->json($order);
    }
}
