<?php

class Local
{
  private $id;
  private $CEP;
  private $endereco;
  private $semNumero;
  private $numero;
  private $bairro;
  private $cidade;
  private $estado;

  public function __construct() {}

  function salvarLocal($dados)
  {
    session_start();

    if (!isset($_SESSION['locais'])) {
      $_SESSION['locais'] = [];
    }

    $_SESSION['locais'][] = $dados;
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
