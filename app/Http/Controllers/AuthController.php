<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $data = $request->all();

        if (Auth::attempt(['email' => strtolower($data['email']), 'password' => $data['password']])) {
            $user = auth()->user();

            $user->token = $user->createToken($user->email)->accessToken;
            return [
                'status' => 200, 
                'message' => "Usuário Logado com sucesso", 
                "usuario" => $user
            ];
        } else {
            return [
                'status' => 404, 
                'message' => "Usuário não encontrado!!"
            ];
        }
    }
}
