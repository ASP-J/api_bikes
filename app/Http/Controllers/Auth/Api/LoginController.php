<?php

namespace App\Http\Controllers\Auth\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function login(LoginRequest $loginRequest)
    {
        $data = $loginRequest->validated();
        
        if(!Auth::attempt($data)){
            return response()->json('Credenciais invalidas', 401);
        }
        
        $user = User::where('email', $data['email'])->first();
        
        $success['token'] =  $user->createToken('MyApp')->plainTextToken;
        $success['name'] =  $user->name;

        return response()->json($success);
    }
    
    public function logout()
    {        
        return Auth::user()->tokens()->delete();

    }
}
