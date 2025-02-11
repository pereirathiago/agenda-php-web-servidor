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
            ->where('status_convite', 1)
            ->with(['compromisso' => function($query) {
                $query->select('id', 'titulo', 'id_compromisso_organizador')
                      ->where('status', 1);
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

    public function buscarConvidadosByIdCompromisso(Compromisso $compromisso) 
    {
        try {
            $compromisso->load(['convites', 'convites.usuarioConvidado' => function ($query) {
                $query->select('id', 'name');
            }, 'user' => function ($query) {
                $query->select('id', 'name');
            }]);
    
            $convidados = $compromisso->convidados->map(function ($convidado) use ($compromisso) {
                return [
                    'id' => $convidado->id,
                    'nomeUsuarioConvidado' => $convidado->nome_completo,
                    'nomeUsuarioOrganizador' => $compromisso->user->nome_completo,
                    'statusConvite' => $convidado->pivot->statusConvite,
                    'idCompromisso' => $compromisso->id,
                    'nomeCompromisso' => $compromisso->titulo,
                ];
            });
    
            return ['code' => 200, 'convidados' => $convidados];
        } catch (\Exception $e) {
            return ['code' => 500, 'message' => 'Erro ao buscar convidados', 'error' => $e->getMessage()];
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
    public function update(UpdateConviteRequest $request, Convite $convite)
    {
        try {
            $dados = $request->validated();
            $dados['id_convite_organizador'] = auth()->user()->id;

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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Convite $convite)
    {
        try {
            $this->authorize('delete', $convite);

            if ($convite->status == 0) {
                throw new \Exception('Convite não existe');
            }

            $convite->update(['status' => 0]);

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
