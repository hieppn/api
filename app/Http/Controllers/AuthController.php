<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request as FacadesRequest;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $user = new User;
        $user->fill($request->all());
        $user->password = Hash::make($request->password);
        $user->save();
        return response()->json($user);
    }
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = User::whereEmail($request->email)->first();
            $user->token = $user->createToken('login')->accessToken;
            return response()->json($user);
        }
        return response()->json(['error' => 'Invalid email or password!'], 401);
    }
    public function user(Request $request)
    {
        return response()->json($request->user('api'));
    }
}
