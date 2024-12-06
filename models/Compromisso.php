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

  public function __get($propriedade)
  {
    return $this->$propriedade;
  }

  public function __set($propriedade, $valor)
  {
    $this->$propriedade = $valor;
  }
}