<?php

require('models/usuarios.model.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' ) {
  autenticarUsuario();
}

function autenticarUsuario()
{
  global $erro, $erroMsg;
  $erroMsg = '';
  session_start();

  $usuario = $_POST['usuario'] ?? '';
  $senha = $_POST['senha'] ?? '';
  if (empty(trim($usuario)) || empty(trim($senha))) {
    $erroMsg = 'Preencha todos os campos';
    $erro = true;
    return;
  }

  $usuarioLogando = autenticar($usuario, $senha);

  if (!$usuarioLogando['sucesso']) {
    $erro = true;
    $erroMsg = $usuarioLogando['erroMsg'];
    return;
  }

  $_SESSION['usuarioLogado'] = $usuarioLogando['usuario'];
  header('Location: /agenda/listar');
}

require("views.php");
