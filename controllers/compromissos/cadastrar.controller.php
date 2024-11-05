<?php

$nomeCompromisso = $_POST['nomeCompromisso'] ?? '';
$dataCompromisso = $_POST['dataCompromisso'] ?? '';
$local = $_POST['locais'];
$descricaoCompromisso = $_POST['descricaoCompromisso'];

$convidados = $_POST['convidados1'] ?? '';

$arrayConvidados = explode(',', rtrim($convidados, ','));
$arrayConvidados = array_unique($arrayConvidados);
print_r($arrayConvidados);
echo $nomeCompromisso;
echo $dataCompromisso;
echo $local;
echo $descricaoCompromisso;



if (empty($nomeCompleto) || empty($dataNascimento) || empty($genero) || empty($fotoPerfil) || empty($nomeUsuario) || empty($email) || empty($senha) || empty($confirmarSenha)) {
  $erro = 'Todos os campos são obrigatórios!';
  return;
}

// if ($senha != $confirmarSenha) {
//   $erro = 'As senhas não conferem!';
//   return;
// }

$dados = [
  'nomeCompleto' => $nomeCompleto,
  'dataNascimento' => $dataNascimento,
  'genero' => $genero,
  'fotoPerfil' => $fotoPerfil,
  'nomeUsuario' => $nomeUsuario,
  'email' => $email,
  'senha' => $senha,

];

// salvarUsuario($dados);
header('Location: usuarios/login');


require("views.php");
