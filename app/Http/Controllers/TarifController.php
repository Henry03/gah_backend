<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarif;
use Illuminate\Support\Facades\DB;

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

    public function search(Request $request){
        $input = $request->input('keyword');
        $filter = $request->input('filter', 't.id');
        $sort = $request->input('sort', 'asc');

        $tarif = DB::table('tarif as t')
            ->select('*', 't.id as id_tarif')
            ->join('jenis_kamar as jk', 'jk.id', '=', 't.id_jenis_kamar')
            ->join('season as s', 's.id', '=', 't.id_season')
            ->where(function ($query) use ($input) {
                $query->where('jk.nama_jenis_kamar', 'like', "%$input%")
                    ->orWhere('s.tipe_season', 'like', "%$input%")
                    ->orWhere('s.nama_season', 'like', "%$input%");
            })
            ->orderBy($filter, $sort)
            ->paginate(10);

        if($tarif){
            return response()->json([
                'success' => true,
                'message' => 'Tarif Ditemukan',
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
