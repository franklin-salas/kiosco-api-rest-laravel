<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistroRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(RegistroRequest $request){

       $data = $request->validated();
       $user = User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => bcrypt($data['password']),
       ]);
    return response()->json([  
        'token'=> $user->createToken('token')->plainTextToken,
        'user' => new UserResource($user)
    ]);

    }

    public function login(LoginRequest $request){
        
        $data = $request->validated();
        if(! Auth::attempt($data)){
            return response()->json([
                'errors' => [
                    'email' => ['El email o el password son incorrectos']
                ]
            ],422);
        }

        $user = Auth::user();
        return response()->json([  
            'token'=> $user->createToken('token')->plainTextToken,
            'user' => new UserResource($user)
        ]);

    }
    public function logout (Request $request){
        $user = $request->user();
        $user->currentAccessToken()->delete();

        return response()->json([
           'user' => null
        ]);
    }
}
