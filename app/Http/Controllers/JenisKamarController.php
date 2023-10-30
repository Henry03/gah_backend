<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisKamar;

class JenisKamarController extends Controller
{
    public function index()
    {
        $jenis_kamars = JenisKamar::all();

        if($jenis_kamars){
            return response()->json([
                'success' => true,
                'message' => 'List Semua Jenis Kamar',
                'data' => $jenis_kamars
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Data Tidak Ditemukan',
            'data' => ''
        ], 404);
    }
}
