<?php

function salvarCompromisso($dados) {
  session_start();

  if (!isset($_SESSION['usuarios'])) {
      $_SESSION['usuarios'] = [];
  }

  $_SESSION['usuarios'][] = $dados;
}

