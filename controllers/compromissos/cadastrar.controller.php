<?php

require('models/local.model.php');
require('models/compromissos.model.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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

  $usuarioLogado = $_SESSION['usuarioLogado'];

  $arrayConvidados = explode(',', rtrim($convidados, ','));
  $arrayConvidados = array_unique($arrayConvidados);

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

  salvarCompromisso($usuarioLogado);

  header('Location: /');
}
require("views.php");
