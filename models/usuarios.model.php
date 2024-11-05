<?php
function autenticar($usuario, $senha)
{
  $usuarios = buscarUsuarios();

  if(empty($usuarios)) return ['sucesso' => false, 'erroMsg' => 'Usuário não cadastrado'];

  foreach ($usuarios as $u) {
    if ($u['nomeUsuario'] === $usuario) {
      if($u['senha'] === $senha)
        return ['sucesso' => true, 'usuario' => $u];
      return ['sucesso' => false, 'erroMsg' => 'Usuário e/ou senha incorretas'];
    }
  }
  return ['sucesso' => false, 'erroMsg' => 'Usuário e/ou senha incorretas'];
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

function buscarUsuarioByNomeUsuario($nomeUsuario) {
  if (!isset($_SESSION)) {
    session_start();
  }
  $usuarios = $_SESSION['usuarios'] ??'';
  foreach ($usuarios as $u) {
    if ($u['nomeUsuario'] === $nomeUsuario) {
      return $u;
    }
  }
  return null;
}

function buscarUsuarioByEmail($email) {
  if (!isset($_SESSION)) {
    session_start();
  }
  $usuarios = $_SESSION['usuarios'] ??'';
  foreach ($usuarios as $u) {
    if ($u['email'] === $email) {
      return $u;
    }
  }
  return null;
}