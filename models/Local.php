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

  public function getId()
  {
    return $this->id;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getCEP()
  {
    return $this->CEP;
  }

  public function setCEP($CEP)
  {
    $this->CEP = $CEP;
  }

  public function getEndereco()
  {
    return $this->endereco;
  }

  public function setEndereco($endereco)
  {
    $this->endereco = $endereco;
  }

  public function getNumero()
  {
    return $this->numero;
  }

  public function setNumero($numero)
  {
    $this->numero = $numero;
  }

  public function isSemNumero()
  {
    return $this->semNumero;
  }

  public function setSemNumero($semNumero)
  {
    $this->semNumero = $semNumero;
  }

  public function getBairro()
  {
    return $this->bairro;
  }

  public function setBairro($bairro)
  {
    $this->bairro = $bairro;
  }

  public function getCidade()
  {
    return $this->cidade;
  }

  public function setCidade($cidade)
  {
    $this->cidade = $cidade;
  }

  public function getEstado()
  {
    return $this->estado;
  }

  public function setEstado($estado)
  {
    $this->estado = $estado;
  }
}
