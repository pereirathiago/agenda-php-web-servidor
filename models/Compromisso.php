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

  function salvarCompromisso($dados, $idLocal)
  {
    $query = "INSERT INTO compromisso (titulo, descricao, data_hora_inicio, data_hora_termino, id_local, id_compromisso_organizador) VALUES (:titulo, :descricao, :dataHoraInicio, :dataHoraFim, :idLocal, :idCompromissoOrganizador)";

    $params = [
      ':titulo' => $dados->titulo,
      ':descricao' => $dados->descricao,
      ':dataHoraInicio' => $dados->dataHoraInicio,
      ':dataHoraFim' => $dados->dataHoraFim,
      ':idLocal' => $idLocal,
      ':idCompromissoOrganizador' => $dados->idCompromissoOrganizador
    ];
    // Debugging: log dos valores
    error_log(print_r($params, true));

    BdConexao::query($query, $params);
    return ['code' => 201, 'message' => 'Compromisso cadastrado com sucesso'];
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