<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Season;
use Carbon\Carbon;

class SeasonController extends Controller
{
    public function index()
    {
        $seasons = Season::all();

        if($seasons){
            return response()->json([
                'success' => true,
                'message' => 'List Semua Season',
                'data' => $seasons
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
        $season = Season::find($id);

        if($season){
            return response()->json([
                'success' => true,
                'message' => 'Detail Season',
                'data' => $season
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Season Tidak Ditemukan',
            'data' => ''
        ], 404);
    }

    public function store(Request $request){
        $now = Carbon::now()->add(2, 'months');

        $input = $request->validate([
            'nama_season' => 'required',
            'tanggal_mulai' => 'required|date|after:now + 2 months',
            'tanggal_selesai' => 'required|date|after:tanggal_mulai',
        ]);

        $season = Season::create($input);

        if($season){
            return response()->json([
                'success' => true,
                'message' => 'Season Berhasil Ditambahkan',
                'data' => $season
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Season Gagal Ditambahkan',
            'data' => ''
        ], 400);
    }

    public function update(Request $request, $id){
        $input = $request->validate([
            'nama_season' => 'required',
            'tanggal_mulai' => 'required|date|after:now + 2 months',
            'tanggal_selesai' => 'required|date|after:tanggal_mulai',
        ]);

        $season = Season::find($id);

        if($season){
            $season->nama_season = $input['nama_season'];
            $season->tanggal_mulai = $input['tanggal_mulai'];
            $season->tanggal_selesai = $input['tanggal_selesai'];
            $season->save();

            return response()->json([
                'success' => true,
                'message' => 'Season Berhasil Diupdate',
                'data' => $season
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Season Gagal Diupdate',
            'data' => ''
        ], 400);
    }

    public function destroy($id){
        $season = Season::find($id);

        if($season){
            $season->delete();

            return response()->json([
                'success' => true,
                'message' => 'Season Berhasil Dihapus',
                'data' => $season
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Season Gagal Dihapus',
            'data' => ''
        ], 400);
    }
}
