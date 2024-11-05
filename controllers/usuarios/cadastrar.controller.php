<?php

require('models/usuarios.model.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $acao2 != 'editar') {
  cadastrarUsuario();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $acao2 == 'editar') {
  editarUsuarioData();
}

function cadastrarUsuario()
{
  global $erro, $erroMsg;
  $erroMsg = '';

  $nomeCompleto = $_POST['nomeCompleto'] ?? '';
  $dataNascimento = $_POST['dataNascimento'] ?? '';
  $genero = $_POST['genero'] ?? '';
  $fotoPerfil = $_POST['fotoPerfil'] ?? '';
  $nomeUsuario = $_POST['nomeUsuario'] ?? '';
  $email = $_POST['email'] ?? '';
  $senha = $_POST['senha'] ?? '';
  $confirmarSenha = $_POST['confirmarSenha'] ?? '';

  if (empty(trim($nomeCompleto)) || empty(trim($dataNascimento)) || empty(trim($genero)) || empty(trim($fotoPerfil)) || empty(trim($nomeUsuario)) || empty(trim($email)) || empty(trim($senha)) || empty(trim($confirmarSenha))) {
    $erro = true;
    $erroMsg = 'Todos os campos são obrigatórios!';
    return;
  }

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $erro = true;
    $erroMsg = 'Email inválido!';
    return;
  }

  if (!preg_match('/^[a-zA-Z0-9]{2,}$/', $nomeUsuario)) {
    $erro = true;
    $erroMsg = 'Nome de usuário pode conter apenas letras, números.';
    return;
  }

  if ($senha != $confirmarSenha) {
    $erro = true;
    $erroMsg = 'As senhas não conferem!';
    return;
  }

  if (strtotime($dataNascimento) > strtotime(date('Y-m-d'))) {
    $erro = true;
    $erroMsg = 'A data de nascimento não pode ser no futuro.';
    return;
}

  if (buscarUsuarioByNomeUsuario($nomeUsuario)) {
    $erro = true;
    $erroMsg = 'Nome de usuário já cadastrado';
    return;
  }

  if (buscarUsuarioByEmail($email)) {
    $erro = true;
    $erroMsg = 'Email já cadastrado';
    return;
  }

  $dados = [
    'nomeCompleto' => $nomeCompleto,
    'dataNascimento' => $dataNascimento,
    'genero' => $genero,
    'fotoPerfil' => $fotoPerfil,
    'nomeUsuario' => $nomeUsuario,
    'email' => $email,
    'senha' => $senha,
    'compromissos' => []
  ];

  salvarUsuario($dados);
  header('Location: /usuarios/login');
}


function editarUsuarioData()
{
  session_start();

  global $erro, $erroMsg;
  $erroMsg = '';

  $nomeCompleto = $_POST['nomeCompleto'] ?? '';
  $dataNascimento = $_POST['dataNascimento'] ?? '';
  $genero = $_POST['genero'] ?? '';
  $fotoPerfil = $_POST['fotoPerfil'] ?? '';
  $nomeUsuario = $_SESSION['usuarioLogado']['nomeUsuario'];
  $email = $_POST['email'] ?? '';
  $senha = $_POST['senha'] ?? '';
  $confirmarSenha = $_POST['confirmarSenha'] ?? '';

  if (empty(trim($nomeCompleto)) || empty(trim($dataNascimento)) || empty(trim($genero)) || empty(trim($fotoPerfil)) || empty(trim($nomeUsuario)) || empty(trim($email)) || empty(trim($senha)) || empty(trim($confirmarSenha))) {
    $erro = true;
    $erroMsg = 'Todos os campos são obrigatórios!';
    return;
  }

  if ($email != $_SESSION['usuarioLogado']['email'] && buscarUsuarioByEmail($email)) {
    $erro = true;
    $erroMsg = 'Email já cadastrado';
    return;
  }

  $dados = [
    'nomeCompleto' => $nomeCompleto,
    'dataNascimento' => $dataNascimento,
    'genero' => $genero,
    'fotoPerfil' => $fotoPerfil,
    'nomeUsuario' => $nomeUsuario,
    'email' => $email,
    'senha' => $senha,
    'compromissos' => []
  ];

  $resultado = editarUsuario($nomeUsuario, $dados);
  if (!$resultado['sucesso']) {
    $erro = true;
    $erroMsg = $resultado['erroMsg'];
    return;
  }

  header('Location: /perfil');
}

if ($acao2 != 'editar') {
  require("views.php");
}
