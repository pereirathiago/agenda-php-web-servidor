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
    
    print_r($params);

    BdConexao::query($query, $params);

    return ['code' => 201, 'message' => 'Compromisso cadastrado com sucesso'];
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

  function deletarCompromisso($id)
  {
    $query = "DELETE FROM compromisso WHERE id = :id";

    $params = [
      ':id' => $id
    ];

    BdConexao::query($query, $params);

    return ['code' => 200, 'message' => 'Compromisso excluído com sucesso'];
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