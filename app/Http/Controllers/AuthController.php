<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Pegawai;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function registerCustomer(Request $request){
        if($request->id_jenis_customer == 1){
            
            $input = $request->validate([
                'id_jenis_customer' => 'required',
                'no_identitas' => 'required',
                'jenis_identitas' => 'required',
                'nama' => 'required',
                'email' => 'required|email:rfc,dns|unique:pegawai|unique:customer',
                'password' => 'required|confirmed',
                'no_telp' => 'required|unique:pegawai|unique:customer',
                'alamat' => 'required',
            ]);
            $input['password'] = bcrypt($input['password']);
            $input['role'] = 'customer';
        }else if($request->id_jenis_customer == 2){
            $input = $request->validate([
                'id_jenis_customer' => 'required',
                'no_identitas' => 'required',
                'jenis_identitas' => 'required',
                'nama_institusi' => 'required',
                'nama' => 'required',
                'email' => 'required|email:rfc,dns|unique:pegawai|unique:customer',
                'no_telp' => 'required|unique:pegawai|unique:customer',
                'alamat' => 'required',
            ]);
            $input['role'] = 'customer';
        }

        $customer = Customer::create($input);
        $token = $customer->createToken('AuthToken')->accessToken;

        return(response()->json([
            'status' => true,
            'message' => 'Customer created successfully',
            'data' => $customer,
            'token' => $token,
        ], 200));
    }

    public function registerPegawai(Request $request){
        $input = $request->validate([
            'id_role' => 'required',
            'nama' => 'required',
            'email' => 'required|email|unique:pegawai|unique:customer',
            'password' => 'required|confirmed',
            'no_telp' => 'required|unique:pegawai|unique:customer',
            'alamat' => 'required',
        ]);

        $input['role'] = 'pegawai';
        $input['password'] = bcrypt($input['password']);
        $pegawai = Pegawai::create($input);
        $token = $pegawai->createToken('AuthToken')->accessToken;

        return(response()->json([
            'status' => true,
            'message' => 'Pegawai created successfully',
            'data' => $pegawai,
            'token' => $token,
        ], 200));
    }

    public function login(Request $request){
        $loginData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        if(Auth::guard('customer')->attempt($loginData)){
            
            $token = Auth::guard('customer')->user()->createToken('AuthToken', ['customer'])->plainTextToken;
            return response()->json([
                'status' => true,
                'message' => 'Login Success',
                'data' => Auth::guard('customer')->user(),
                'role' => 'customer',
                'token' => $token,
            ], 200);
        }


        if(Auth::guard('pegawai')->attempt($loginData)){
            if(Auth::guard('pegawai')->user()->id_role == 1){
                $token = Auth::guard('pegawai')->user()->createToken('AuthToken', ['owner'])->plainTextToken;
            }else if(Auth::guard('pegawai')->user()->id_role == 2){
                $token = Auth::guard('pegawai')->user()->createToken('AuthToken', ['admin'])->plainTextToken;
            }else if(Auth::guard('pegawai')->user()->id_role == 3){
                $token = Auth::guard('pegawai')->user()->createToken('AuthToken', ['gm'])->plainTextToken;
            }else if(Auth::guard('pegawai')->user()->id_role == 4){
                $token = Auth::guard('pegawai')->user()->createToken('AuthToken', ['sm'])->plainTextToken;
            }else if(Auth::guard('pegawai')->user()->id_role == 5){
                $token = Auth::guard('pegawai')->user()->createToken('AuthToken', ['fo'])->plainTextToken;
            }
            return response()->json([
                'status' => true,
                'message' => 'Login Success',
                'data' => Auth::guard('pegawai')->user(),
                'role' => 'pegawai',
                'token' => $token,
            ], 200);
        }

        return response()->json([
            'status' => false,
            'message' => 'Invalid Credentials',
        ], 401);
    }

    public function logout(Request $request){
        // dd($request->user());
        $user = $request->user()->tokens();
        // return $user;
        $dataUser = $request->user();
        $user->delete();

        return response([
            'message' => 'Logout Succes',
            'user' => $dataUser
        ]);
    }

    public function changePassword(Request $request){
        // return $request->guard;
        // return Auth::guard('customer-api')->user();
        $user = Auth::user();

        $input = $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);
        
        if(!Hash::check($request->old_password, $user->password)){
            return response()->json([
                'status' => false,
                'message' => 'Old password does not match',
                'errors' => [
                    'old_password' => ['Old password does not match']
                ]
            ], 422);
        }
        $input['password'] = bcrypt($input['password']);
        $user->password = $input['password'];
        $user->save();

        return response()->json([
            'status' => true,
            'message' => 'Password changed successfully',
            'data' => $user,
        ], 200);
    }

    public function signedinCheck () {
        $user = Auth::user();
        if($user){
            return response()->json([
                'status' => true,
                'message' => 'User is signed in',
                'data' => $user,
            ], 200);
        }else{
            return response()->json([
                'status' => false,
                'message' => 'User is not signed in',
            ], 401);
        }
    }
}