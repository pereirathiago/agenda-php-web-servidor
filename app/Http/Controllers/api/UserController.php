<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\user\StoreUserRequest;
use App\Http\Requests\user\UpdateUserRequest;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $filtro = request()->query('filtro', '');

            $usuarios = User::whereLike('nome_usuario', "%{$filtro}%")
                ->orWhereLike('name', "%{$filtro}%")
                ->orWhereLike('email', "%{$filtro}%")
                ->get();

            return response()->json([
                'code' => 200,
                'usuarios' => $usuarios
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao buscar usuários',
                'error' => $e->getMessage()
            ], 500);
        }
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
    public function show($id)
    {
        try {
            $usuario = User::findOrFail($id);

            return response()->json([
                "message" => "Usuário encontrado com sucesso",
                "user" => $usuario
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "message" => "Erro ao buscar usuário",
                "error" => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request)
    {
        try {
            $dados = $request->validated();

            if (isset($dados['password'])) {
                $dados['password'] = Hash::make($dados['password']);
            }

            $usuario = auth()->user();
            $usuario->update($dados);

            return response()->json([
                "message" => "Usuário atualizado com sucesso",
                "user" => $usuario
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "message" => "Erro ao atualizar usuário",
                "error" => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        try {
            $usuario = auth()->user();

            if (!$usuario->can('delete', $usuario)) {
                return response()->json([
                    "message" => "Você não tem permissão para deletar este usuário"
                ], 403);
            }
            $usuario->delete();

            return response()->json([
                "message" => "Usuário deletado com sucesso"
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "message" => "Erro ao deletar usuário",
                "error" => $e->getMessage()
            ], 500);
        }
    }
}
