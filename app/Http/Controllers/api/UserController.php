<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Hash;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        try {       
            $dados = $request->validated();
            
            $dados['password'] = Hash::make($dados['password']);

            $user = User::create($dados);

            if (!$user) {
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

    /**
     * Display the specified resource.
     */
    public function show(User $usuario)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $usuario)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $usuario)
    {
        
    }
}
