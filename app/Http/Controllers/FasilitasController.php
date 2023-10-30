<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fasilitas;
use Illuminate\Support\Facades\DB;

class FasilitasController extends Controller
{
    public function index()
    {
        $fasilitas = Fasilitas::all();

        if($fasilitas){
            return response()->json([
                'success' => true,
                'message' => 'List Semua Fasilitas',
                'data' => $fasilitas
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
        $fasilitas = Fasilitas::find($id);

        if($fasilitas){
            return response()->json([
                'success' => true,
                'message' => 'Detail Fasilitas',
                'data' => $fasilitas
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Fasilitas Tidak Ditemukan',
            'data' => ''
        ], 404);
    }

    public function store(Request $request){
        $input = $request->validate([
            'nama_fasilitas' => 'required',
            'harga' => 'required',
        ]);

        $fasilitas = Fasilitas::create($input);

        if($fasilitas){
            return response()->json([
                'success' => true,
                'message' => 'Fasilitas Berhasil Ditambahkan',
                'data' => $fasilitas
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Fasilitas Gagal Ditambahkan',
            'data' => ''
        ], 400);
    }

    public function update(Request $request, $id){
        $input = $request->validate([
            'nama_fasilitas' => 'required',
            'harga' => 'required',
        ]);

        $fasilitas = Fasilitas::find($id);

        if($fasilitas){
            $fasilitas->nama_fasilitas = $input['nama_fasilitas'];
            $fasilitas->harga = $input['harga'];
            $fasilitas->save();

            return response()->json([
                'success' => true,
                'message' => 'Fasilitas Berhasil Diupdate',
                'data' => $fasilitas
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Fasilitas Gagal Diupdate',
            'data' => ''
        ], 400);
    }

    public function destroy($id){
        $fasilitas = Fasilitas::find($id);

        if($fasilitas){
            $fasilitas->delete();
            return response()->json([
                'success' => true,
                'message' => 'Fasilitas Berhasil Dihapus',
                'data' => $fasilitas
            ], 200);

        }

        return response()->json([
            'success' => false,
            'message' => 'Fasilitas Gagal Dihapus',
            'data' => ''
        ], 400);
    }

    public function search(Request $request){
        $input = $request->input('keyword');
        $filter = $request->input('filter', 'nama_fasilitas');
        $sort = $request->input('sort', 'asc');

        $fasilitas = DB::table('fasilitas')
        ->where('nama_fasilitas', 'like', '%' . $input . '%')
        ->orWhere('harga', 'like', '%' . $input . '%')
        ->orderBy($filter, $sort)
        ->paginate(10);

        if($fasilitas){
            return response()->json([
                'success' => true,
                'message' => 'Hasil Pencarian Fasilitas',
                'data' => $fasilitas
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Fasilitas Tidak Ditemukan',
            'data' => ''
        ], 404);
    }
}
