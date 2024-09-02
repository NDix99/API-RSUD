<?php
use App\Http\Controllers\Controller;
use App\Models\TempResult;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as TempResultController; // Added this line

class Controllers extends TempResultController // Updated this line
{
    public function store(Request $request)
    {
        // Simpan data sementara di Laravel
        $tempResult = new TempResult();
        $tempResult->no_rm = $request->input('no_rm');
        $tempResult->nama_pasien = $request->input('nama_pasien');
        $tempResult->hasil = $request->input('hasil');
        $tempResult->tanggal = $request->input('tanggal');
        $tempResult->save();

        return response()->json(['status' => 'success', 'message' => 'Data disimpan sementara.']);
    }

}