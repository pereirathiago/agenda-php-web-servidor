<?php


if ($acao == 'cadastrar') {
  cadastrarCompromisso();
}

function cadastrarCompromisso()
{
  session_start();
  $nomeCompromisso = $_POST['nomeCompromisso'] ?? '';
  $dataCompromisso = $_POST['dataCompromisso'] ?? '';
  $local = $_POST['locais'] ?? '';
  $descricaoCompromisso = $_POST['descricaoCompromisso'] ?? '';

  $convidados = $_POST['convidados1'] ?? '';
  $usuarioLogado = $_SESSION['usuarioLogado']; //talvez seja isso aqui pra puxar o usuario logado

  $arrayConvidados = explode(',', rtrim($convidados, ','));
  $arrayConvidados = array_unique($arrayConvidados);
  // print_r($arrayConvidados);
  // echo $nomeCompromisso;
  // echo $dataCompromisso;
  // echo $local;
  // echo $descricaoCompromisso;



  if (empty($nomeCompromisso) || empty($dataCompromisso) || empty($local) || empty($descricaoCompromisso)) {
    $erro = 'Todos os campos são obrigatórios!';
    return;
  }


  $dados = [
    'nomeCompromisso' => $nomeCompromisso,
    'dataCompromisso' => $dataCompromisso,
    'local' => $local,
    'descricaoCompromisso' => $descricaoCompromisso,
    'convidados' => $arrayConvidados,
  ];
  $usuarioLogado['compromisso'][] = $dados;

  require('models/usuarios.model.php');
  editarUsuario(  $usuarioLogado['nomeUsuario'], $usuarioLogado);

  print_r($_SESSION['usuarioLogado']);


  // salvarUsuario($dados);
  //header('Location: /compromissos/cadastrar');
}
require("views.php");
