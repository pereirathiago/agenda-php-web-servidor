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

  function salvarUsuario($dados)
  {
    session_start();

    if (!isset($_SESSION['usuarios'])) {
      $_SESSION['usuarios'] = [];
    }

    $_SESSION['usuarios'][] = $dados;
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

  public function getId()
  {
    return $this->id;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getNomeUsuario()
  {
    return $this->nomeUsuario;
  }

  public function setNomeUsuario($nomeUsuario)
  {
    $this->nomeUsuario = $nomeUsuario;
  }

  public function getNomeCompleto()
  {
    return $this->nomeCompleto;
  }

  public function setNomeCompleto($nomeCompleto)
  {
    $this->nomeCompleto = $nomeCompleto;
  }

  public function getDataNascimento()
  {
    return $this->dataNascimento;
  }

  public function setDataNascimento($dataNascimento)
  {
    $this->dataNascimento = $dataNascimento;
  }

  public function getGenero()
  {
    return $this->genero;
  }

  public function setGenero($genero)
  {
    $this->genero = $genero;
  }

  public function getFotoPerfil()
  {
    return $this->fotoPerfil;
  }

  public function setFotoPerfil($fotoPerfil)
  {
    $this->fotoPerfil = $fotoPerfil;
  }

  public function getEmail()
  {
    return $this->email;
  }

  public function setEmail($email)
  {
    $this->email = $email;
  }

  public function getSenha()
  {
    return $this->senha;
  }

  public function setSenha($senha)
  {
    $this->senha = $senha;
  }
}
