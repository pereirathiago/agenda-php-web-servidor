<?php

class Autenticacao
{
  function autenticar($usuario, $senha)
  {
    $usuarios = Usuario::buscarUsuarios();

    if (empty($usuarios)) return ['sucesso' => false, 'erroMsg' => 'Usuário não cadastrado'];

    foreach ($usuarios as $u) {
      if ($u['nomeUsuario'] === $usuario) {
        if ($u['senha'] === $senha)
          return ['sucesso' => true, 'usuario' => $u];
        return ['sucesso' => false, 'erroMsg' => 'Usuário e/ou senha incorretas'];
      }
    }
    return ['sucesso' => false, 'erroMsg' => 'Usuário e/ou senha incorretas'];
  }

  function logout()
  {
    session_start();
    unset($_SESSION["usuarioLogado"]);
    header('Location: /usuarios/login');
    exit();
  }
}