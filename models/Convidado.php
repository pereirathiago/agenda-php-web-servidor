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


  static function cadastrarConvidado($dados)
  {
    $query = "INSERT INTO convidado (id_usuario_convidado, status_convite, id_compromisso) VALUES (:idUsuarioConvidado, :statusConvite, :idCompromisso)";

    $params = [
      ':idUsuarioConvidado' => $dados['idUsuarioConvidado'],
      ':statusConvite' => $dados['statusConvite'],
      ':idCompromisso' => $dados['idCompromisso']
    ];

    print_r($params);

    BdConexao::query($query, $params);

    return ['code' => 201, 'message' => 'Convidado cadastrado com sucesso'];
  }

  static function buscarConvidadosByIdCompromisso($idCompromisso)
  {
    $query = "SELECT 
      c.id, c.id_usuario_convidado AS idUsuarioConvidado, uo.nome_completo AS nomeUsuarioOrganizador, c.status_convite AS statusConvite, c.id_compromisso AS idCompromisso, co.titulo AS nomeCompromisso
      FROM convidado c
      JOIN compromisso co ON c.id_compromisso = co.id
      JOIN usuario uo ON co.id_compromisso_organizador = uo.id
      WHERE c.id_compromisso = :idCompromisso";

    $params = [
      ':idCompromisso' => $idCompromisso
    ];

    $convidados = BdConexao::query($query, $params)->fetchAll(PDO::FETCH_CLASS, "Convidado");

    return ['code' => 200, 'convidados' => $convidados];
  }

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

  static function buscarConviteById($id)
  {
    $query = "SELECT 
      c.id, c.id_usuario_convidado AS idUsuarioConvidado, uo.nome_completo AS nomeUsuarioOrganizador, c.status_convite AS statusConvite, c.id_compromisso AS idCompromisso, co.titulo AS nomeCompromisso
      FROM convidado c
      JOIN compromisso co ON c.id_compromisso = co.id
      JOIN usuario uo ON co.id_compromisso_organizador = uo.id
      WHERE c.id = :id";

    $params = [
      ':id' => $id
    ];

    $convite = BdConexao::query($query, $params)->fetchObject("Convidado");

    return $convite;
  }

  public function atualizarStatusConvite()
  {
    $query = "UPDATE convidado SET status_convite = :statusConvite WHERE id = :id";

    $params = [
      ':statusConvite' => $this->statusConvite,
      ':id' => $this->id
    ];

    BdConexao::query($query, $params);

    return ['code' => 200, 'message' => 'Convidado editado com sucesso'];
  }

  static function atualizarStatusConviteTodosConvidados($idCompromisso, $statusConvite)
  {
    $query = "UPDATE convidado SET status_convite = :statusConvite WHERE id_compromisso = :idCompromisso";

    $params = [
      ':statusConvite' => $statusConvite,
      ':idCompromisso' => $idCompromisso
    ];

    BdConexao::query($query, $params);

    return ['code' => 200, 'message' => 'Convidados editado com sucesso'];
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
