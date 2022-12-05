<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa; 
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function home (Request $request)
    {
        $mahasiswa = $request->mahasiswa;

        return response()->json([
            'status' => 'Success',
            'message' => 'selamat datang ' . $mahasiswa->nama,
        ],200);
    }
}


    