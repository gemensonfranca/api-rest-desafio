<?php

namespace App\Http\Controllers\Auth\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class RegistroController extends Controller
{
    public function registro(Request $request, User $user)
    {
        $usuario = $request->only('name', 'email', 'password');
        $usuario['password'] = bcrypt($usuario['password']);

        if(!$user = $user->create($usuario)) abort(500, "Erro na criação do usuário");

        return response()->json([
            'data' => ['user' => $user]
        ]);
    }
}
