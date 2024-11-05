<?php
function autenticar($usuario, $senha)
{
  $usuarios = buscarUsuarios();

  if(empty($usuarios)) return;

  foreach ($usuarios as $u) {
    if ($u['nomeUsuario'] === $usuario && $u['senha'] === $senha) {
      return $u;
    }
  }
  return;
}

function logout()
{
  session_start();
  unset($_SESSION["usuarioLogado"]);
  header('Location: /usuarios/login');
  exit();
}

function salvarUsuario($dados) {
  session_start();

  if (!isset($_SESSION['usuarios'])) {
      $_SESSION['usuarios'] = [];
  }

  $_SESSION['usuarios'][] = $dados;
}

function buscarUsuarios() {
  $usuarios = $_SESSION['usuarios'] ?? '';
  return $usuarios;
}