<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TerasListTmpController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'data' => 'required|json',
        ]);

        $terasListTmp = new \App\Models\TerasListTmp();
        $terasListTmp->data = $request->input('data');
        $terasListTmp->save();

        return response()->json(['message' => 'Data saved successfully'], 201);
    }
}
