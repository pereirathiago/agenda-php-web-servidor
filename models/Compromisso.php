<?php

require_once('Usuario.php'); 

class Compromisso
{
  private $id;
  private $titulo;
  private $descricao;
  private $dataHoraInicio;
  private $dataHoraFim;
  private $local;
  private $idCompromissoOrganizador;

  public function __construct() { }

  function salvarCompromisso($dados)
  {
    if (!isset($_SESSION)) {
      session_start();
    }
    
    $usuario = new Usuario();
    $usuario->editarUsuario($dados['nomeUsuario'], $dados);
  }

  public function getId()
  {
    return $this->id;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getTitulo()
  {
    return $this->titulo;
  }

  public function setTitulo($titulo)
  {
    $this->titulo = $titulo;
  }

  public function getDescricao()
  {
    return $this->descricao;
  }

  public function setDescricao($descricao)
  {
    $this->descricao = $descricao;
  }

  public function getDataHoraInicio()
  {
    return $this->dataHoraInicio;
  }

  public function setDataHoraInicio($dataHoraInicio)
  {
    $this->dataHoraInicio = $dataHoraInicio;
  }

  public function getDataHoraFim()
  {
    return $this->dataHoraFim;
  }

  public function setDataHoraFim($dataHoraFim)
  {
    $this->dataHoraFim = $dataHoraFim;
  }

  public function getLocal()
  {
    return $this->local;
  }

  public function setLocal($local)
  {
    $this->local = $local;
  }

  public function getIdCompromissoOrganizador()
  {
    return $this->idCompromissoOrganizador;
  }

  public function setIdCompromissoOrganizador($idCompromissoOrganizador)
  {
    $this->idCompromissoOrganizador = $idCompromissoOrganizador;
  }
}