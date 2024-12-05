<?php
session_start();

class Agenda {
  private $id;
  private $idUsuario;
  private $nomeUsuario;
  
  public function __construct() { }

  static function obterCompromissosDoUsuario()
  {
    if (!isset($_SESSION)) {
      session_start();
    }
  $usuarioLogado = $_SESSION['usuarioLogado'];
  
  if (!isset($usuarioLogado['compromisso']) || empty($usuarioLogado['compromisso'])) {
    return [];
  } else
    return $usuarioLogado['compromisso'];
  }
  
  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function getIdUsuario() {
    return $this->idUsuario;
  }

  public function setIdUsuario($idUsuario) {
    $this->idUsuario = $idUsuario;
  }

  public function getNomeUsuario() {
    return $this->nomeUsuario;
  }

  public function setNomeUsuario($nomeUsuario) {
    $this->nomeUsuario = $nomeUsuario;
  }
}