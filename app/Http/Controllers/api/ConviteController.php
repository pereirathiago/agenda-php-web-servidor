<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Compromisso;
use App\Models\Convite;
use App\Http\Requests\convite\StoreConviteRequest;
use App\Http\Requests\convite\UpdateConviteRequest;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ConviteController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function buscarConvites()
    {
        try {
            $convites = Convite::where('id_usuario_convidado', auth()->user()->id)
            ->with(['compromisso' => function($query) {
                $query->select('id', 'titulo', 'id_compromisso_organizador');
            }, 'compromisso.user' => function($query) {
                $query->select('id', 'name');
            }])
            ->get();

            $convites = $convites->map(function ($convite) {
                return [
                    'id' => $convite->id,
                    'idUsuarioConvidado' => $convite->id_usuario_convidado,
                    'nomeUsuarioOrganizador' => $convite->compromisso->user->name,
                    'statusConvite' => $convite->status_convite,
                    'idCompromisso' => $convite->compromisso->id,
                    'nomeCompromisso' => $convite->compromisso->titulo,
                ];
            });

            return response()->json([
                'code' => 200,
                'convites' => $convites
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao buscar convites',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreConviteRequest $request)
    {
        try {
            $dados = $request->validated();
    
            $convite = new Convite();
            $convite->id_usuario_convidado = $dados['idUsuarioConvidado'];
            $convite->status_convite = $dados['statusConvite'];
            $convite->id_compromisso = $dados['idCompromisso'];
            $convite->save();
    
            return response()->json([
                'code' => 201,
                'message' => 'Convidado cadastrado com sucesso',
                'convite' => $convite
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao criar convite',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Convite $convite)
    {
        try {
            if ($convite->status != 1) {
                throw new \Exception('Convite não existe');
            }

            return response()->json([
                "message" => "Convite encontrado com sucesso",
                "convite" => $convite->load(['local', 'user', 'convites'])
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao buscar convite',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateStatus(UpdateConviteRequest $request, Convite $convite)
    {
        try {
            $dados = $request->validated();

            $convite->update($dados);

            return response()->json([
                'message' => 'Convite atualizado com sucesso',
                'convite' => $convite
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao atualizar convite',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function updateStatusTodosConvites(UpdateConviteRequest $request)
    {
        try {
            $dados = $request->validated();
            $idConvite = $dados['status_convite'];

            $convites = Convite::where('id_usuario_convidado', auth()->user()->id)
            ->get();

            $convites->each(function ($convite) use ($idConvite) {
                $convite->status_convite = $idConvite;
                $convite->save();
            });

            return response()->json([
                'message' => 'Convites atualizados com sucesso',
                'convites' => $convites
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao atualizar convites',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Convite $convite)
    {
        try {
            $convite->delete();

            return response()->json([
                'message' => 'Convite deletado com sucesso'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
            'message' => 'Erro ao deletar convite',
            'error' => $e->getMessage()
            ], 500);
        }
    }
}
