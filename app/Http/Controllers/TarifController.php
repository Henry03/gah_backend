<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarif;

class TarifController extends Controller
{
    public function index(Request $request)
    {

        $tarifs = Tarif::with('jenis_kamar', 'season')->get();

        if($tarifs){
            return response()->json([
                'success' => true,
                'message' => 'List Semua Tarif',
                'data' => $tarifs
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
        $tarif = Tarif::with('jenis_kamar', 'season')->find($id);

        if($tarif){
            return response()->json([
                'success' => true,
                'message' => 'Detail Tarif',
                'data' => $tarif
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Tarif Tidak Ditemukan',
            'data' => ''
        ], 404);
    }

    public function store(Request $request){
        $input = $request->validate([
            'id_jenis_kamar' => 'required',
            'id_season' => 'required',
            'tarif' => 'required',
        ]);

        $tarif = Tarif::create($input);

        if($tarif){
            return response()->json([
                'success' => true,
                'message' => 'Tarif Berhasil Ditambahkan',
                'data' => $tarif
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Tarif Gagal Ditambahkan',
            'data' => ''
        ], 400);
    }

    public function update(Request $request, $id){
        $tarif = Tarif::find($id);

        if($tarif){
            $input = $request->validate([
                'id_jenis_kamar' => 'required',
                'id_season' => 'required',
                'tarif' => 'required',
            ]);

            $tarif->id_jenis_kamar = $input['id_jenis_kamar'];
            $tarif->id_season = $input['id_season'];
            $tarif->tarif = $input['tarif'];
            $tarif->save();

            return response()->json([
                'success' => true,
                'message' => 'Tarif Berhasil Diupdate',
                'data' => $tarif
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Tarif Tidak Ditemukan',
            'data' => ''
        ], 404);
    }

    public function destroy($id){
        $tarif = Tarif::find($id);

        if($tarif){
            $tarif->delete();

            return response()->json([
                'success' => true,
                'message' => 'Tarif Berhasil Dihapus',
                'data' => $tarif
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Tarif Tidak Ditemukan',
            'data' => ''
        ], 404);
    }
}
