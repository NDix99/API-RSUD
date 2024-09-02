<?php

namespace App\Http\Controllers;

use App\Models\TempResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\TempResultController; // Ensure BaseController is imported

class Controller extends TempResultController // Ensure this class extends the appropriate base class
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