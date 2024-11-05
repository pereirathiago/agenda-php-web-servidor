<?php
require('models/usuarios.model.php');

function salvarCompromisso($dados) {
  session_start();
  // foreach ()

  $_SESSION['usuario']['compromisso'][] = $dados;
}

