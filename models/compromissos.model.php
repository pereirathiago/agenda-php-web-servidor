<?php
require('models/usuarios.model.php');

function salvarCompromisso($dados) {
  if (!isset($_SESSION)) {
    session_start();
  }

  editarUsuario($dados['nomeUsuario'], $dados);
}

