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



if (empty($nomeCompromisso) || empty($dataCompromisso) || empty($local) || empty($descricaoCompromisso)) {
  $erro = 'Todos os campos são obrigatórios!';
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

];

// salvarUsuario($dados);
header('Location: usuarios/login');


require("views.php");
