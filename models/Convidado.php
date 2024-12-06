<?php

class Convidado
{
  private $id;
  private $nomeUsuario;
  private $statusAceito; // 0 = Não confirmado, 1 = Confirmado, 2 = Recusado
  private $idCompromisso;
  private $nomeCompromisso;
  private $nomeUsuarioCompromisso;

  public function __construct() { }

  public function __get($propriedade)
  {
    return $this->$propriedade;
  }

  public function __set($propriedade, $valor)
  {
    $this->$propriedade = $valor;
  }
}
