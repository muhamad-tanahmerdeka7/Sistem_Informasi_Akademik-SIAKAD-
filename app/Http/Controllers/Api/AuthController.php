<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
// use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required'
        ]);
        // mrng query berdasarkan email
        $user = User::where('email', $request->email)->first();

        // if  jika user nya kosong

        if (!$user) {
            throw ValidationException::withMessages([
                'email' => ['email incorrect']
            ]);
        }
        // jika ada email apakah sama dengan email yang di input dengan password
        if (!Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'password' => ['password incorrect']
            ]);
        }
        // jika normal sama password dengan email kita generate token
        $token = $user->createToken('api-token')->plainTextToken;


        return response()->json(
            [
                'jwt-token' => $token,
                // agar saatr login di api new UserResource($user), respon hanya tampil user , id name , email , roles
                'user' => new UserResource($user),
            ]
        );
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json([
            'message' => 'logout successfully',
        ]);
    }
}
