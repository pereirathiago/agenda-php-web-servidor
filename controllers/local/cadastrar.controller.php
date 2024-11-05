<?php

require('models/local.model.php');

if($_SERVER['REQUEST_METHOD'] == 'POST') {
  cadastrarLocais();
}

function cadastrarLocais()
{
  global $erro, $erroMsg;
  $erroMsg = '';

  $cep = $_POST['cep'] ?? '';
  $endereco = $_POST['endereco'] ?? '';
  $numero = $_POST['numero'] ?? '';
  $bairro = $_POST['bairro'] ?? '';
  $cidade = $_POST['cidade'] ?? '';
  $estado = $_POST['estado'] ?? '';

  if (empty(trim($cep)) || empty(trim($endereco)) || empty(trim($numero)) || empty(trim($bairro)) || empty(trim($cidade)) || empty(trim($estado))) {
    $erro = true;
    $erroMsg = 'Todos os campos são obrigatórios!';
    return;
  }

  $dados = [
    'cep' => $cep,
    'endereco' => $endereco,
    'numero' => $numero,
    'bairro' => $bairro,
    'cidade' => $cidade,
    'estado' => $estado
  ];

  salvarLocal($dados);
  header('Location: /local');
}

require("views.php");
