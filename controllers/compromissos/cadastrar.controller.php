<?php


if ($acao == 'cadastrar') {
  cadastrarCompromisso();
}

function cadastrarCompromisso()
{
  $nomeCompromisso = $_POST['nomeCompromisso'] ?? '';
  $dataCompromisso = $_POST['dataCompromisso'] ?? '';
  $local = $_POST['locais'] ?? '';
  $descricaoCompromisso = $_POST['descricaoCompromisso'] ?? '';

  $convidados = $_POST['convidados1'] ?? '';

  // $nomeCompleto = $_SESSION['usuarioLogado']['nomeCompleto'];
  // $dataNascimento = $_SESSION['usuarioLogado']['dataNascimento'];
  // $genero = $_SESSION['usuarioLogado']['genero'];


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
  print_r($usuarioLogado);


  // salvarUsuario($dados);
  //header('Location: /compromissos/cadastrar');
}
require("views.php");
