<?php

require('models/local.model.php');
require('models/compromissos.model.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  cadastrarCompromisso();
}

function cadastrarCompromisso()
{
  global $erro, $erroMsg;
  $erroMsg = '';

  session_start();
  $nomeCompromisso = $_POST['nomeCompromisso'] ?? '';
  $dataCompromisso = $_POST['dataCompromisso'] ?? '';
  $local = $_POST['locais'] ?? '';
  $descricaoCompromisso = $_POST['descricaoCompromisso'] ?? '';
  $convidados = $_POST['convidados1'] ?? '';

  $usuarioLogado = $_SESSION['usuarioLogado'];

  $arrayConvidados = explode(',', rtrim($convidados, ','));
  $arrayConvidados = array_unique($arrayConvidados);

  if (empty(trim($nomeCompromisso)) || empty(trim($dataCompromisso)) || empty(trim($local)) || empty(trim($descricaoCompromisso))) {
    $erro = true;
    $erroMsg = 'Todos os campos são obrigatórios!';
    return;
  }

  if (!strtotime($dataCompromisso) < strtotime(date('Y-m-d'))) {
    $erro = true;
    $erroMsg = 'A data do compromisso deve ser uma data válida e não pode estar no passado.';
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

  salvarCompromisso($usuarioLogado);

  header('Location: /');
}
require("views.php");
