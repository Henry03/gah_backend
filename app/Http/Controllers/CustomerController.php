<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{

    public function index()
    {
        return response()->json([
            'status' => true,
            'message' => 'Customer retrieved successfully',
            'data' => Customer::all(),
        ], 200);
    }

    public function show()
    {
        $id = Auth::user()->id;
        $customer = Customer::find($id);

        if($customer){
            return response()->json([
                'success' => true,
                'message' => 'Detail Customer',
                'data' => $customer
            ], 200);

        }

        return response()->json([
            'success' => false,
            'message' => 'Customer Tidak Ditemukan',
            'data' => ''
        ], 404);
    }

    public function update(Request $request)
    {
        $id = Auth::user()->id;
        $customer = Customer::find($id);
        if($customer){
            $input = $request->validate([
                'jenis_identitas' => 'required',
                'no_identitas' => 'required',
                'nama' => 'required',
                'alamat' => 'required',
                'no_telp' => 'required',

            ]);
            
            $customer->update($input);

            return response()->json([
                'success' => true,
                'message' => 'Customer Berhasil Diupdate',
                'data' => $customer
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Customer Tidak Ditemukan',
            'data' => ''
        ], 404);
    }
}
