<?php
session_start();

function obterCompromissosDoUsuario()
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
