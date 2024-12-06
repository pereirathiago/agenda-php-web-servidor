<?php

class Usuario
{
  private $id;
  private $nomeUsuario;
  private $nomeCompleto;
  private $dataNascimento;
  private $genero;
  private $fotoPerfil;
  private $email;
  private $senha;

  public function __construct() { }

  function cadastrarUsuario($usuario)
  {
    
  }

  public function editarUsuario($nomeUsuario, $dados)
  {
    if (!isset($_SESSION)) {
      session_start();
    }

    $usuarios = $_SESSION['usuarios'];
    foreach ($usuarios as &$usuario) {
      if ($usuario['nomeUsuario'] === $nomeUsuario) {
        $usuario = array_merge($usuario, $dados);
        $_SESSION['usuarios'] = $usuarios;
        $_SESSION['usuarioLogado'] = $usuario;
        return ['sucesso' => true, 'usuario' => $usuario];
      }
    }

    return ['sucesso' => false, 'erroMsg' => 'Usuário não encontrado.'];
  }

  static function buscarUsuarios()
  {
    if (!isset($_SESSION)) {
      session_start();
    }
    $usuarios = $_SESSION['usuarios'] ?? '';
    return $usuarios;
  }

  function buscarUsuarioByNomeUsuario($nomeUsuario)
  {
    if (!isset($_SESSION)) {
      session_start();
    }
    $usuarios = $_SESSION['usuarios'] ?? '';
    foreach ($usuarios as $u) {
      if ($u['nomeUsuario'] === $nomeUsuario) {
        return $u;
      }
    }
    return null;
  }

  function buscarUsuarioByEmail($email)
  {
    if (!isset($_SESSION)) {
      session_start();
    }
    $usuarios = $_SESSION['usuarios'] ?? '';
    foreach ($usuarios as $u) {
      if ($u['email'] === $email) {
        return $u;
      }
    }
    return null;
  }

  public function __get($propriedade)
  {
    return $this->$propriedade;
  }

  public function __set($propriedade, $valor)
  {
    $this->$propriedade = $valor;
  }
}
