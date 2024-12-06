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
}
