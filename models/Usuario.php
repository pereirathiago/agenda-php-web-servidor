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

  function autenticar($usuario, $senha)
  {
    $usuarios = $this->buscarUsuarios();

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

  function salvarUsuario($usuario)
  {
    session_start();

    if (!isset($_SESSION['usuarios'])) {
      $_SESSION['usuarios'] = [];
    }

    $_SESSION['usuarios'][] = $usuario;
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
