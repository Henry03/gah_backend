<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservasi;
use Illuminate\Support\Facades\DB;

class ReservasiController extends Controller
{
    public function indexByCustomer() 
    {
        $id = auth()->user()->id;
        $transaksi = Reservasi::with('transaksi')->where('id_customer', $id)->get();
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

    public function index(Request $request) 
    {
        $input = $request->input('keyword');
        $filter = $request->input('filter', 'id_booking');
        $sort = $request->input('sort', 'asc');
        
        $transaksi = DB::table('reservasi as r')
            ->where('r.id_booking', 'like', '%' . $input . '%')
            ->orWhere('r.tgl_reservasi', 'like', '%' . $input . '%')
            ->orderBy($filter, $sort)
            ->paginate(10);

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
        $id = $id;
        $transaksi =  DB::table('reservasi')
        ->leftJoin('customer AS c', 'reservasi.id_customer', '=', 'c.id')
        ->leftJoin('transaksi AS t', 'reservasi.id', '=', 't.id_reservasi')
        ->leftJoin('deposit AS d', 'reservasi.id_deposit', '=', 'd.id')
        ->leftJoin('uang_jaminan AS u', 'reservasi.id_uang_jaminan', '=', 'u.id')
        ->select('*', 'reservasi.created_at')
        ->where(function ($query) use ($id) {
            $query->where('reservasi.id', $id)
                ->orWhereNull('reservasi.id_deposit')
                ->orWhereNull('reservasi.id_uang_jaminan')
                ->orWhereNull('t.id_reservasi');
        })
        ->first();

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

    public function showKamar($id){
        $kamar = DB::table('reservasi as r')
        ->join('jumlah_kamar as jk', 'r.id', '=', 'jk.id_reservasi')
        ->join('jenis_kamar as jkr', 'jk.id_jenis_kamar', '=', 'jkr.id')
        ->join('tarif as t', 't.id_jenis_kamar', '=', 'jk.id_jenis_kamar')
        ->where('r.id', '=', $id)
        ->select('*', DB::raw('(t.tarif * jk.jumlah) as total_harga'))
        ->get();

        if($kamar){
            return response()->json([
                'success' => true,
                'message' => 'Detail Transaksi',
                'data' => $kamar
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Transaksi Tidak Ditemukan',
            'data' => ''
        ], 404);
    }

    public function showLayanan($id){
        $kamar = DB::table('reservasi AS r')
        ->join('reservasi_fasilitas AS rf', 'r.id', '=', 'rf.id_reservasi')
        ->join('fasilitas AS f', 'rf.id_fasilitas', '=', 'f.id')
        ->where('r.id', $id)
        ->select('*', DB::raw('(rf.jumlah * f.harga) as sub_total_fasilitas'))
        ->get();

        if($kamar){
            return response()->json([
                'success' => true,
                'message' => 'Detail Transaksi',
                'data' => $kamar
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Transaksi Tidak Ditemukan',
            'data' => ''
        ], 404);
    }
}
