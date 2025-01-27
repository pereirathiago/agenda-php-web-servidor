<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        try {
            $request->validate([
                "name" => "required|string",
                "email" => "required|string|email|unique:users",
                "password" => "required|string"
            ]);

            $user = User::create([
                "name" => $request->name,
                "email" => $request->email,
                "password" => bcrypt($request->password)
            ]);

            if(!$user)
            {
                return response()->json([
                    "message" => "Erro ao criar usuário"
                ], 500);
            }

            return response()->json([
                "message" => "Usuário criado com sucesso",
                "user" => $user
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                "message" => "Erro ao criar usuário",
                "error" => $e->getMessage()
            ], 500);
        }
    }

    public function login(Request $request)
    {
        $request->validate([
            "email" => "required|email|string",
            "password" => "required"
        ]);

        $user = User::where("email", $request->email)->first();

        if (!empty($user)) {
            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken("mytoken")->plainTextToken;

                return response()->json([
                    "message" => "Usuario logado com sucesso",
                    "token" => $token
                ], 200);
            } else {
                return response()->json([
                    "message" => "Usuario ou senha incorretos"
                ], 401);
            }
        } else {
            return response()->json([
                "message" => "Usuario ou senha incorretos"
            ], 401);
        }
    }

    public function profile(): JsonResponse
    {
        return response()->json([
            "user" => Auth::user()
        ], 200);
    }
}
