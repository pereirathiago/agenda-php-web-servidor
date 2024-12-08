<?php

class Convidado
{
  private $id;
  private $statusConvite; // 0 = Não confirmado, 1 = Confirmado, 2 = Recusado, 3 = Cancelado
  private $idCompromisso;
  private $id_usuario_convidado;
  private $id_usuario_organizador;

  public function __construct() { }

  public function __get($propriedade)
  {
    return $this->$propriedade;
  }

  public function __set($propriedade, $valor)
  {
    $this->$propriedade = $valor;
  }

  /*function cadastrarConvidado($convidado)
  {
    $query = "INSERT INTO convidado (id_usuario_organizador, statusConvite, id_compromisso, id_usuario_convidado) VALUES (:idUsuarioOrganizador, :statusConvite, :idCompromisso, :idUsuarioConvidado)";

    $params = [
      ':idUsuarioOrganizador' => 
      ':statusConvite' => 
      ':idCompromisso' => 
      ':idUsuarioConvidado' => 
    ];

    BdConexao::query($query, $params);

    return ['code' => 201, 'message' => 'Usuário cadastrado com sucesso'];
  }
}*/
}