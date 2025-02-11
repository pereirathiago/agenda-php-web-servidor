<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Compromisso;
use App\Http\Requests\compromisso\StoreCompromissoRequest;
use App\Http\Requests\compromisso\UpdateCompromissoRequest;
use Illuminate\Support\Facades\Auth;

class CompromissoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $filtro = request()->query('filtro', '');

            $compromissos = Compromisso::where('id_compromisso_organizador', auth()->user()->id)
                ->where(function ($query) use ($filtro) {
                    $query->where('titulo', 'like', "%{$filtro}%")
                          ->orWhere('descricao', 'like', "%{$filtro}%");
                })
                ->get();

            return response()->json([
                'code' => 200,
                'compromissos' => $compromissos
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao buscar compromissos',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompromissoRequest $request)
    {
        //cadastrar compromisso
        try {
            $dados = $request->validated();
            $dados['id_compromisso_organizador'] = auth()->user()->id;
            $dados['status'] = 1;
            $compromisso = Compromisso::create($dados);

            if (!$compromisso) {
                return response()->json([
                    "message" => "Erro ao criar compromisso"
                ], 500);
            }

            return response()->json([
                "message" => "Compromisso criado com sucesso",
                "compromisso" => $compromisso
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao criar compromisso',
                'error' => $e->getMessage()
            ], 500);
        }        
    }

    /**
     * Display the specified resource.
     */
    public function show(Compromisso $compromisso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompromissoRequest $request)
    {
        //função para atualizar compromisso
        try {
            $dados = $request->validated();
            $dados['id_compromisso_organizador'] = auth()->user()->id;

            $compromisso = Compromisso::find($dados['id']);

            $compromisso->update($dados);

            return response()->json([
                'message' => 'Compromisso atualizado com sucesso',
                'compromisso' => $compromisso
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao atualizar compromisso',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Compromisso $compromisso)
    {
        try {
            $compromisso->delete();

            return response()->json([
                'message' => 'Compromisso deletado com sucesso'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao deletar compromisso',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
