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

  static function buscarLocais()
  {
    if (!isset($_SESSION)) {
      session_start();
    }
    $locais = $_SESSION['locais'] ?? '';
    return $locais;
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
