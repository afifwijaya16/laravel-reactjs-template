<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthApiController extends Controller
{
    public function createToken() {
        $user = User::first();
        $accessToken = $user->createToken('Token Name')->accessToken;
        return $accessToken;
    }

    public function login(Request $request) {
        $formData = $request->all();
        $validator = Validator::make($formData, [
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Masukan Email',
            'password.required' => 'Masukan Password',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->getMessageBag()->first(),
                'errors' => $validator->getMessageBag(),
            ]);
        }
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (Auth::attempt($credentials)) {
            $user = User::where('email', $request->email)->first();
            $accessToken = $user->createToken('authToken')->accessToken;
            return response()->json([
                'success' => true,
                'message' => 'Login Berhail',
                'user' => $user,
                'access_token' => $accessToken,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Email dan Password Salah',
                'errors' => null,
            ]);
        }
    }

    public function register(Request $request) {
        $formData = $request->all();
        $validator = Validator::make($formData, [
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required|confirmed',
        ], [
            'name.required' => 'Masukan Nama Pengguna',
            'email.required' => 'Masukan Email',
            'email.unique' => 'Email Telah digunakan',
            'password.required' => 'Masukan Password',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->getMessageBag()->first(),
                'errors' => $validator->getMessageBag(),
            ]);
        }
        $user = User::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => Hash::make($request->password),
        ]);
        if (!is_null($user)) {
            $user_data = User::where('email', $request->email)->first();
            $accessToken = $user_data->createToken('authToken')->accessToken;
            return response()->json([
                'success' => true,
                'message' => 'Pendaftaran Berhasil',
                'user' => $user,
                'access_token' => $accessToken,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Pendaftaran Tidak Berhasil !',
                'errors' => null,
            ]);
        }
    }
    
}
