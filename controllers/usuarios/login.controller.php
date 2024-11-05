<?php

require('models/usuarios.model.php');

if($acao == 'login') {
  autenticarUsuario();
}
if($acao == 'logout') {
  logout();
}

function autenticarUsuario()
{
  session_start();

  $usuario = $_POST['usuario'] ?? '';
  $senha = $_POST['senha'] ?? '';
  $usuarioLogando = autenticar($usuario, $senha);
  if (empty($usuario) || empty($senha)) {
    $erro = 'Todos os campos são obrigatórios!';
    return;
  }

  if ($usuarioLogando) {
    $_SESSION['usuario'] = $usuario;
    $_SESSION['nome'] = $usuarioLogando;
    header('Location: /agenda/listar');
  } else {
    header('Location: /usuarios/login');
  }
}

require("views.php");
