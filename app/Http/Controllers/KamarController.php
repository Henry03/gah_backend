<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamar;

class KamarController extends Controller
{
    public function index()
    {
        
        $kamars = Kamar::with('jenis_kamar', 'status_kamar')->get();

        if($kamars){
            return response()->json([
                'success' => true,
                'message' => 'List Semua Kamar',
                'data' => $kamars
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
        $kamar = Kamar::with('jenis_kamar', 'status_kamar')->find($id);

        if($kamar){
            return response()->json([
                'success' => true,
                'message' => 'Detail Kamar',
                'data' => $kamar
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Kamar Tidak Ditemukan',
            'data' => ''
        ], 404);
    }

    public function store(Request $request){
        $input = $request->validate([
            'id' => 'required',
            'id_jenis_kamar' => 'required',
            'id_status_kamar' => 'required',
            'tempat_tidur' => 'required',
            'kapasitas' => 'required',
            'deskripsi' => 'required',
            'rincian' => 'required',
        ]);

        $kamar = Kamar::create($input);

        if($kamar){
            return response()->json([
                'success' => true,
                'message' => 'Kamar Berhasil Ditambahkan',
                'data' => $kamar
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Kamar Gagal Ditambahkan',
            'data' => ''
        ], 400);
    }

    public function update(Request $request, $id){
        $input = $request->validate([
            'id' => 'required',
            'id_jenis_kamar' => 'required',
            'id_status_kamar' => 'required',
            'tempat_tidur' => 'required',
            'kapasitas' => 'required',
            'deskripsi' => 'required',
            'rincian' => 'required',
        ]);

        $kamar = Kamar::find($id);

        if($kamar){
            $kamar->id = $input['id'];
            $kamar->id_jenis_kamar = $input['id_jenis_kamar'];
            $kamar->id_status_kamar = $input['id_status_kamar'];
            $kamar->tempat_tidur = $input['tempat_tidur'];
            $kamar->kapasitas = $input['kapasitas'];
            $kamar->deskripsi = $input['deskripsi'];
            $kamar->rincian = $input['rincian'];
            $kamar->save();

            return response()->json([
                'success' => true,
                'message' => 'Kamar Berhasil Diupdate',
                'data' => $kamar
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Kamar Gagal Diupdate',
            'data' => ''
        ], 400);
    }

    public function destroy($id){
        $kamar = Kamar::find($id);

        if($kamar){
            $kamar->delete();

            return response()->json([
                'success' => true,
                'message' => 'Kamar Berhasil Dihapus',
                'data' => $kamar
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Kamar Gagal Dihapus',
            'data' => ''
        ], 400);
    }  
}
