<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => $request['password'],
        ]);
        
        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];
         
        return response($response, 201);

    }

    public function login(Request $request){

        $user = User::where('email', $request['email'])->first();

        if(!Hash::check($request['password'], $user->password)){
            return response([
                'message' => 'Bad Credentials'
            ],401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

    }

    public function logout(Request $request){
        auth()->user()->tokens;
        return[
            'message' => 'Logged out'
        ];
    }
}
