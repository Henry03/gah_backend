<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class TransaksiController extends Controller
{
    public function indexByCustomer() 
    {
        $id = auth()->user()->id;
        $transaksi = Transaksi::where('id_customer', $id)->get();

        if($transaksi){
            return response()->json([
                'success' => true,
                'message' => 'List Semua Transaksi',
                'data' => $transaksi
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Data Tidak Ditemukan',
            'data' => ''
        ], 404);
    }

    public function show($id)
    {
        $transaksi = Transaksi::find($id);

        if($transaksi){
            return response()->json([
                'success' => true,
                'message' => 'Detail Transaksi',
                'data' => $transaksi
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Transaksi Tidak Ditemukan',
            'data' => ''
        ], 404);
    }
}
