<?php

function salvarLocal($dados) {
  session_start();

  if (!isset($_SESSION['locais'])) {
      $_SESSION['locais'] = [];
  }

  $_SESSION['locais'][] = $dados;
}

function buscarLocais() {
  if (!isset($_SESSION)) {
    session_start();
  }
  $locais = $_SESSION['locais'] ?? '';
  return $locais;
}
