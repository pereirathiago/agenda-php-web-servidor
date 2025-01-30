<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\auth\LoginAuthRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(LoginAuthRequest $request)
    {
        $request->validated();

        $user = User::where("email", $request->email)->first();

        if (empty($user) || !Hash::check($request->password, $user->password)) {
            return response()->json([
                "message" => "Usuario ou senha incorretos"
            ], 401);
        }

        $token = $user->createToken("mytoken")->plainTextToken;

        return response()->json([
            "message" => "Usuario logado com sucesso",
            "token" => $token
        ], 200);
    }

    public function logout(): JsonResponse
    {
        Auth::user()->tokens()->delete();

        return response()->json([
            "message" => "Usuário deslogado com sucesso"
        ], 200);
    }

    public function sessionUser(): JsonResponse
    {
        return response()->json([
            "message" => "Usuário logado",
            "user" => Auth::user()
        ], 200);
    }
}
