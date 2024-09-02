<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiAuthHandleController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    }
}
