<?php

class Autenticacao
{
  function autenticar($usuario, $senha)
  {
    $usuario = Usuario::buscarUsuarioByNomeUsuario($usuario);

    if ($usuario['code'] === 404) throw new Exception($usuario['message'], 404);

    if (!password_verify($senha, $usuario['senha'])) {
      throw new Exception('Usuário e/ou senha incorretos', 401);
    }

    session_start();
    $_SESSION["usuarioLogado"] = $usuario;
    header('Location: /');
    
    return ['code' => 200, 'message' => 'Usuário autenticado com sucesso'];
  }

  function logout()
  {
    session_start();
    unset($_SESSION["usuarioLogado"]);
    header('Location: /usuarios/login');
    exit();
  }
}
