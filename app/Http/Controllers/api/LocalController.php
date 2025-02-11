<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Local;
use App\Http\Requests\local\StoreLocalRequest;
use App\Http\Requests\local\UpdateLocalRequest;

class LocalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $filtro = request()->query('filtro', '');

            $locais = Local::where('id_usuario', auth()->user()->id)
                ->where(function($query) use ($filtro) {
                    $query->where('endereco', 'like', "%{$filtro}%")
                          ->orWhere('cep', 'like', "%{$filtro}%");
                })
                ->get();

            return response()->json([
                'code' => 200,
                'locais' => $locais
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao buscar locais',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLocalRequest $request)
    {
        //cadastrar local
        try {
            $dados = $request->validated();
            $dados['id_usuario'] = auth()->user()->id;
            $local = Local::create($dados);

            if (!$local) {
                return response()->json([
                    "message" => "Erro ao criar local"
                ], 500);
            }

            return response()->json([
                "message" => "Local criado com sucesso",
                "local" => $local
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao criar local',
                'error' => $e->getMessage()
            ], 500);
        }        
    }

    /**
     * Display the specified resource.
     */
    public function show(Local $local)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLocalRequest $request)
    {
        //atualizar local
        try {
            $dados = $request->validated();
            $local = Local::find($dados['id']);

            //verifica se o local pertence ao usuário autenticado
            if(!$local || $local->id_usuario != auth()->user()->id) {
                return response()->json([
                    'message' => 'O local selecionado não pertence ao usuário autenticado.'
                ], 403);
            }
            
            $dados['id_usuario'] = auth()->user()->id;
            $local->update($dados);

            return response()->json([
                "message" => "Local atualizado com sucesso",
                "local" => $local
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao atualizar local',
                'error' => $e->getMessage(),
                'dados' => $dados
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Local $local)
    {
        //
    }
}
