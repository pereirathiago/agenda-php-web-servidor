<?php

require_once('Usuario.php'); 

class Compromisso
{
  private $id;
  private $titulo;
  private $descricao;
  private $dataHoraInicio;
  private $dataHoraFim;
  private $local;
  private $idCompromissoOrganizador;

  public function __construct() { }

  function salvarCompromisso($dados)
  {
    $query = "INSERT INTO compromisso (titulo, descricao, data_hora_inicio, data_hora_termino, id_local, id_compromisso_organizador) VALUES (:titulo, :descricao, :dataHoraInicio, :dataHoraFim, :idLocal, :idCompromissoOrganizador)";

    $params = [
      ':titulo' => $dados->titulo,
      ':descricao' => $dados->descricao,
      ':dataHoraInicio' => $dados->dataHoraInicio,
      ':dataHoraFim' => $dados->dataHoraFim,
      ':idLocal' => $dados->local,
      ':idCompromissoOrganizador' => $dados->idCompromissoOrganizador
    ];
    
    BdConexao::query($query, $params);

    return ['code' => 201, 'message' => 'Compromisso cadastrado com sucesso', 'id' => BdConexao::get()->lastInsertId()];
  }

  static function buscarCompromissoByIdUsuario($idUsuario, $filtro = '')
  {
    $query = "SELECT 
      id, titulo, descricao, data_hora_inicio AS dataHoraInicio, data_hora_termino AS dataHoraFim, id_local AS idLocal, id_compromisso_organizador AS idCompromissoOrganizador FROM compromisso where id_compromisso_organizador = :idUsuario";

    $params = [
      ':idUsuario' => $idUsuario
    ];

    if ($filtro) {
      $query .= " WHERE titulo LIKE :filtro OR descricao LIKE :filtro";

      $params .= [
        ':filtro' => "%$filtro%"
      ];
    }
    $compromissos = BdConexao::query($query, $params)->fetchAll(PDO::FETCH_CLASS, "Compromisso");

    return ['code' => 200, 'compromissos' => $compromissos];
  }

  static function buscarCompromissoById($id)
  {

    $query = "SELECT 
      id, titulo, descricao, data_hora_inicio AS dataHoraInicio, data_hora_termino AS dataHoraFim, id_local AS idLocal, id_compromisso_organizador AS idCompromissoOrganizador FROM compromisso WHERE id = :id";

    $params = [
      ':id' => $id,
    ];

    $compromisso = BdConexao::query($query, $params)->fetchObject("Compromisso");

    if (!$compromisso) {
      return ['code' => 404, 'message' => 'Compromisso não encontrado'];
    }

    return ['code' => 200, 'compromisso' => $compromisso];
  }

  function deletarCompromisso($id)
  {
    $query = "DELETE FROM compromisso WHERE id = :id";
    Convidado::atualizarStatusConviteTodosConvidados($id, 3);

    $params = [
      ':id' => $id
    ];

    BdConexao::query($query, $params);

    return ['code' => 200, 'message' => 'Compromisso excluído com sucesso'];
  }
  public function editarCompromisso($compromisso)
  {
    $query = "UPDATE compromisso SET titulo = :titulo, descricao = :descricao, data_hora_inicio = :dataHoraInicio, data_hora_termino = :dataHoraFim, id_local = :idLocal WHERE id = :id";

    $params = [
      ':titulo' => $compromisso->titulo,
      ':descricao' => $compromisso->descricao,
      ':dataHoraInicio' => $compromisso->dataHoraInicio,
      ':dataHoraFim' => $compromisso->dataHoraFim,
      ':idLocal' => $compromisso->local,
      ':id' => $compromisso->id
    ];

    BdConexao::query($query, $params);

    return ['code' => 200, 'message' => 'Compromisso editado com sucesso'];
  }

  public function __get($propriedade)
  {
    return $this->$propriedade;
  }

  public function __set($propriedade, $valor)
  {
    $this->$propriedade = $valor;
  }
}