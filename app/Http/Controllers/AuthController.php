<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $fields = $request->validated();

        $user = User::create($fields);
        $token = $user->createToken(bcrypt($fields['email'] . $fields['password'] . Str::random()));
    
        return response()->json([
            'message' => 'Successfully registered',
            'token' => $token->plainTextToken
        ]);
    }

    public function login(LoginRequest $request)
    {
        $fields = $request->validated();

        if (!Auth::attempt($fields)) {
            return response()->json([
                'message' => 'Email or password is wrong'
            ]);
        }

        $user = Auth::user();
        $token = $user->createToken(bcrypt($fields['email'] . $fields['password'] . Str::random()));
        
        return response()->json([
            'message' => 'Successfully logged in',
            'token' => $token->plainTextToken
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json([
            'message' => 'Successfully logged out',
        ]);
    }
}
