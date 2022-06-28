<?php

namespace App\Http\Controllers\Auth\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credenciais = $request->only('email', 'password');

        if(!auth()->attempt($credenciais)) abort(401, "Credencial não é válida");

        $token = auth()->user()->createToken('new_token');

        return response()->json([
            'data' => ['token' => $token->plainTextToken]
        ]);
    }

    public function logout()
    {
        auth()->user()->conrrentAccessToken()->delete();

        return response()->json([], 204);
    }
}
