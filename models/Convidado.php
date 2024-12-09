<?php

class Convidado
{
  private $id;
  private $nomeUsuario;
  private $statusConvite; // 0 = Não confirmado, 1 = Confirmado, 2 = Recusado, 3 = Cancelado
  private $idCompromisso;
  private $nomeCompromisso;

  public function __construct() { }

  public function __get($propriedade)
  {
    return $this->$propriedade;
  }

  public function __set($propriedade, $valor)
  {
    $this->$propriedade = $valor;
  }

  public static function buscarConvidadosPorCompromisso($idCompromisso) {
    $query = "SELECT id_usuario_convidado AS idUsuarioConvidado FROM convidado WHERE id_compromisso = :idCompromisso";

    $params = [
        ':idCompromisso' => $idCompromisso
    ];

    $resultado = BdConexao::query($query, $params);

    if (!$resultado) {
        return ['code' => 404, 'message' => 'Nenhum usuário convidado encontrado.'];
    }

    $idsUsuariosConvidados = $resultado->fetchAll(PDO::FETCH_COLUMN);

    if (empty($idsUsuariosConvidados)) {
        return ['code' => 404, 'message' => 'Nenhum usuário convidado encontrado.'];
    }

    $placeholders = implode(',', array_fill(0, count($idsUsuariosConvidados), '?'));
    $queryFinal = "SELECT nome_usuario AS usuarioConvidado FROM usuario WHERE id IN ($placeholders)";

    $resultadoFinal = BdConexao::query($queryFinal, $idsUsuariosConvidados);

    if (!$resultadoFinal) {
        return ['code' => 404, 'message' => 'Erro ao buscar nomes de usuários.'];
    }

    $nomesUsuariosConvidados = $resultadoFinal->fetchAll(PDO::FETCH_COLUMN);

    if (empty($nomesUsuariosConvidados)) {
        return ['code' => 404, 'message' => 'Nenhum nome de usuário encontrado.'];
    }

    return [
        'nomeUsuario' => implode(', ', $nomesUsuariosConvidados) 
    ];
}
}