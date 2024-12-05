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

  public function getId()
  {
    return $this->id;
  }

  public function getNomeUsuario()
  {
    return $this->nomeUsuario;
  }

  public function getStatusAceito()
  {
    return $this->statusAceito;
  }

  public function getIdCompromisso()
  {
    return $this->idCompromisso;
  }

  public function getNomeCompromisso()
  {
    return $this->nomeCompromisso;
  }

  public function getNomeUsuarioCompromisso()
  {
    return $this->nomeUsuarioCompromisso;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function setNomeUsuario($nomeUsuario)
  {
    $this->nomeUsuario = $nomeUsuario;
  }

  public function setStatusAceito($statusAceito)
  {
    $this->statusAceito = $statusAceito;
  }

  public function setIdCompromisso($idCompromisso)
  {
    $this->idCompromisso = $idCompromisso;
  }

  public function setNomeCompromisso($nomeCompromisso)
  {
    $this->nomeCompromisso = $nomeCompromisso;
  }

  public function setNomeUsuarioCompromisso($nomeUsuarioCompromisso)
  {
    $this->nomeUsuarioCompromisso = $nomeUsuarioCompromisso;
  }
}
