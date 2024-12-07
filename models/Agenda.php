<?php
session_start();

class Agenda {
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
  
  public function __get($propriedade)
  {
    return $this->$propriedade;
  }

  public function __set($propriedade, $valor)
  {
    $this->$propriedade = $valor;
  }
}