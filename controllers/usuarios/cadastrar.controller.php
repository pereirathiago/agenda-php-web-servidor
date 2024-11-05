<?php

require('models/usuarios.model.php');

if ($acao == 'cadastrar') {
  cadastrarUsuario();
}

function cadastrarUsuario() {
  $nomeCompleto = $_POST['nomeCompleto'] ?? '';
  $dataNascimento = $_POST['dataNascimento'] ?? '';
  $genero = $_POST['genero'] ?? '';
  $fotoPerfil = $_POST['fotoPerfil'] ?? '';
  $nomeUsuario = $_POST['nomeUsuario'] ?? '';
  $email = $_POST['email'] ?? '';
  $senha = $_POST['senha'] ?? '';
  $confirmarSenha = $_POST['confirmarSenha'] ?? '';


  if (empty($nomeCompleto) || empty($dataNascimento) || empty($genero) || empty($fotoPerfil) || empty($nomeUsuario) || empty($email) || empty($senha) || empty($confirmarSenha)) {
    $erro = 'Todos os campos são obrigatórios!';
    return;
  }

  if ($senha != $confirmarSenha) {
    $erro = 'As senhas não conferem!';
    return;
  }

  $dados = [
    'nomeCompleto' => $nomeCompleto,
    'dataNascimento' => $dataNascimento,
    'genero' => $genero,
    'fotoPerfil' => $fotoPerfil,
    'nomeUsuario' => $nomeUsuario,
    'email' => $email,
    'senha' => $senha
  ];

  salvarUsuario($dados);
  header('Location: usuarios/login');
}

require("views.php");
