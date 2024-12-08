<?php

class Local
{
  private $id;
  private $cep;
  private $endereco;
  private $semNumero;
  private $numero;
  private $bairro;
  private $cidade;
  private $estado;
  private $idUsuario;

  public function __construct() {}

  function salvarLocal($dados)
  {
    $query = "INSERT INTO local (cep, endereco, sem_numero, numero, bairro, cidade, estado, id_usuario) VALUES (:cep, :endereco, :semNumero, :numero, :bairro, :cidade, :estado, :idUsuario)";

    $params = [
      ':cep' => $dados->cep,
      ':endereco' => $dados->endereco,
      ':semNumero' => $dados->semNumero,
      ':numero' => $dados->numero,
      ':bairro' => $dados->bairro,
      ':cidade' => $dados->cidade,
      ':estado' => $dados->estado,
      ':idUsuario' => $dados->idUsuario
    ];

    BdConexao::query($query, $params);

    return ['code' => 201, 'message' => 'Local cadastrado com sucesso'];
  }

  static function buscarLocais($filtro = '')
  {
    $query = "SELECT 
      id, cep, endereco, sem_numero AS semNumero, numero, bairro, cidade, estado, id_usuario AS idUsuario 
      FROM local";

    $params = [];

    if ($filtro) {
      $query .= " WHERE cep LIKE :filtro OR endereco LIKE :filtro OR bairro LIKE :filtro OR cidade LIKE :filtro OR estado LIKE :filtro";

      $params = [
        ':filtro' => "%$filtro%"
      ];
    }
    $locais = BdConexao::query($query, $params)->fetchAll(PDO::FETCH_CLASS, "Local");

    return ['code' => 200, 'locais' => $locais];
  }

  function deletarLocal($id)
  {
    $query = "DELETE FROM local WHERE id = :id";

    $params = [
      ':id' => $id
    ];

    BdConexao::query($query, $params);

    return ['code' => 200, 'message' => 'Local excluído com sucesso'];
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
