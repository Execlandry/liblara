<?php

namespace App\Http\Controllers\Api\V1\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use App\Models\User;

class AuthsController extends Controller
{
    public function register(Request $request)
    {
        //validate fields
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);
        //create user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        //return user and token in response
        $token = $user->createToken($request->password)->plainTextToken;

        return response([
            'user' => $user,
            'token' => $token
        ], 201);
    }

    
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        //Attempt login
        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'message' => "The provided credentials are incorrect"
            ], 401);
        
        }

        $token = $user->createToken($request->password)->plainTextToken;

        return response([
            'user' => $user,
            'token' => $token
        ], 200);
    }

    
        public function logout()
        {
            auth()->user()->tokens()->delete();
            return response([
                'message' => "Successfully Logged out"
            ]);
        }
}
