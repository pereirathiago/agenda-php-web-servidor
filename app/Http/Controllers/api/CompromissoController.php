<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Compromisso;
use App\Http\Requests\compromisso\StoreCompromissoRequest;
use App\Http\Requests\compromisso\UpdateCompromissoRequest;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CompromissoController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $filtro = request()->query('filtro', '');

            $compromissosOrganizados = Compromisso::where('id_compromisso_organizador', auth()->user()->id)
                ->where('status', 1)
                ->where(function ($query) use ($filtro) {
                    $query->where('titulo', 'like', "%{$filtro}%")
                        ->orWhere('descricao', 'like', "%{$filtro}%");
                })
                ->get();

            $compromissosConvidado = Compromisso::whereHas('convites', function ($query) use ($filtro) {
                $query->where('id_usuario_convidado', auth()->user()->id)
                    ->where('status_convite', 1)
                    ->where('status', 1)
                    ->where(function ($query) use ($filtro) {
                        $query->where('titulo', 'like', "%{$filtro}%")
                            ->orWhere('descricao', 'like', "%{$filtro}%");
                    });
            })
            ->get();

            return response()->json([
                'code' => 200,
                'compromissosOrganizados' => $compromissosOrganizados,
                'compromissosConvidado' => $compromissosConvidado
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
        try {
            if ($compromisso->status != 1) {
                throw new \Exception('Compromisso não existe');
            }

            return response()->json([
                "message" => "Compromisso encontrado com sucesso",
                "compromisso" => $compromisso->load(['local', 'user', 'convites'])
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao buscar compromisso',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompromissoRequest $request, Compromisso $compromisso)
    {
        try {
            $dados = $request->validated();
            $dados['id_compromisso_organizador'] = auth()->user()->id;

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
            $this->authorize('delete', $compromisso);

            if ($compromisso->status == 0) {
                throw new \Exception('Compromisso não existe');
            }

            $compromisso->update(['status' => 0]);

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
