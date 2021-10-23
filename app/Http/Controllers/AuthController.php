<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
        $fields = $request->validate(([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|confirmed'
        ]));

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => Hash::make($fields['password'])
        ]);

        $token = $user->createToken('webAppToken')->plainTextToken;

        $response = [
            'user'=>$user,
            'token'=>$token
        ];

        return response($response, 201);
    }

    public function login(Request $request){
        $fields = $request->validate(([
            'email' => 'required|email',
            'password' => 'required|string'
        ]));
        
        $user = User::where('email', $fields['email'])->first();

        if(!$user || !Hash::check($fields['password'], $user->password)){
            return response([ 'message' => 'Email or/and Password are incorrect' ], 401);
        }

        $token = $user->createToken('webAppToken')->plainTextToken;

        $response = [
            'user'=>$user,
            'token'=>$token
        ];

        return response($response, 201);
    }

    public function logout(Request $request){
        Auth::user()->currentAccessToken()->delete();

        $response = [
            'message' => 'Logged out successfully.'
        ];

        return response($response, 200);
    }

    public function logout_everywhere(Request $request){
        Auth::user()->tokens()->delete();

        $response = [
            'message' => 'Logged out successfully.'
        ];

        return response($response, 200);
    }
}
