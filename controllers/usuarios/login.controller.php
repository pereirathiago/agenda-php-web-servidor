<?php

require('models/usuarios.model.php');

autenticarUsuario();

function autenticarUsuario()
{
  session_start();

  $usuario = $_POST['usuario'] ?? '';
  $senha = $_POST['senha'] ?? '';
  if (empty($usuario) || empty($senha)) {
    $erro = 'Todos os campos são obrigatórios!';
    return;
  }

  $usuarioLogando = autenticar($usuario, $senha);

  if ($usuarioLogando) {
    $_SESSION['usuarioLogado'] = $usuarioLogando;
    header('Location: /agenda/listar');
  } else {
    header('Location: /usuarios/login');
  }
}

require("views.php");
