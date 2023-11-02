<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class PegawaiController extends Controller
{
    public function show()
    {
        $id = Auth::user()->id;
        $customer = Pegawai::find($id);

        if($customer){
            return response()->json([
                'success' => true,
                'message' => 'Detail Pegawai',
                'data' => $customer
            ], 200);

        }

        return response()->json([
            'success' => false,
            'message' => 'Pegawai Tidak Ditemukan',
            'data' => ''
        ], 404);
    }

    public function update(Request $request)
    {
        $id = Auth::user()->id;
        $pegawai = Pegawai::find($id);
        if($pegawai){
            $input = $request->validate([
                'nama' => 'required',
                'alamat' => 'required',
                'no_telp' => ['required'],

            ]);
            
            $pegawai->update($input);

            return response()->json([
                'success' => true,
                'message' => 'pegawai Berhasil Diupdate',
                'data' => $pegawai
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'pegawai Tidak Ditemukan',
            'data' => ''
        ], 404);
    }
}
