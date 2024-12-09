<?php

class Convidado
{
  private $id;
  private $idUsuarioConvidado;
  private $nomeUsuarioOrganizador;
  private $statusConvite; // 0 = Não confirmado, 1 = Confirmado, 2 = Recusado, 3 = Cancelado
  private $idCompromisso;
  private $nomeCompromisso;

  public function __construct() { }

  static function buscarConvitesByIdUsuario($idUsuario)
  {
    $query = "SELECT 
      c.id, c.id_usuario_convidado AS idUsuarioConvidado, uo.nome_completo AS nomeUsuarioOrganizador, c.status_convite AS statusConvite, c.id_compromisso AS idCompromisso, co.titulo AS nomeCompromisso
      FROM convidado c
      JOIN compromisso co ON c.id_compromisso = co.id
      JOIN usuario uo ON co.id_compromisso_organizador = uo.id
      WHERE c.id_usuario_convidado = :idUsuario";

    $params = [
      ':idUsuario' => $idUsuario
    ];

    $convites = BdConexao::query($query, $params)->fetchAll(PDO::FETCH_CLASS, "Convidado");

    return ['code' => 200, 'convites' => $convites];
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
