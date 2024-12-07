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

  public function __construct() {}

  function cadastrarUsuario($usuario)
  {
    $query = "INSERT INTO usuario (nome_completo, nome_usuario, data_nascimento, genero, foto_perfil, email, senha) VALUES (:nomeCompleto, :nomeUsuario, :dataNascimento, :genero, :fotoPerfil, :email, :senha)";

    $params = [
      ':nomeCompleto' => $usuario->nomeCompleto,
      ':nomeUsuario' => $usuario->nomeUsuario,
      ':dataNascimento' => $usuario->dataNascimento,
      ':genero' => $usuario->genero,
      ':fotoPerfil' => $usuario->fotoPerfil,
      ':email' => $usuario->email,
      ':senha' => $usuario->senha
    ];

    BdConexao::query($query, $params);

    return ['code' => 201, 'message' => 'Usuário cadastrado com sucesso'];
  }

  public function editarUsuario($nomeUsuario, $usuario)
  {
    $query = "UPDATE usuario SET nome_completo = :nomeCompleto, data_nascimento = :dataNascimento, genero = :genero, foto_perfil = :fotoPerfil, email = :email, senha = :senha WHERE nome_usuario = :nomeUsuario";

    $params = [
      ':nomeCompleto' => $usuario->nomeCompleto,
      ':dataNascimento' => $usuario->dataNascimento,
      ':genero' => $usuario->genero,
      ':fotoPerfil' => $usuario->fotoPerfil,
      ':email' => $usuario->email,
      ':senha' => $usuario->senha,
      ':nomeUsuario' => $nomeUsuario
    ];

    BdConexao::query($query, $params);

    return ['code' => 200, 'message' => 'Usuário editado com sucesso'];
  }

  static function buscarUsuarios($filtro = '')
  {
    $query = "SELECT 
      id, nome_usuario AS nomeUsuario, nome_completo AS nomeCompleto, data_nascimento AS dataNascimento, genero, foto_perfil AS fotoPerfil, email, senha 
      FROM usuario";

    $params = [];

    if ($filtro) {
      $query .= " WHERE nome_usuario LIKE :filtro OR nome_completo LIKE :filtro OR email LIKE :filtro";

      $params = [
        ':filtro' => "%$filtro%"
      ];
    }
    $usuarios = BdConexao::query($query, $params)->fetchAll(PDO::FETCH_CLASS, "Usuario");

    return ['code' => 200, 'usuarios' => $usuarios];
  }

  static function buscarUsuarioByNomeUsuario($nomeUsuario)
  {
    $query = "SELECT 
      id, nome_usuario AS nomeUsuario, nome_completo AS nomeCompleto, data_nascimento AS dataNascimento, genero, foto_perfil AS fotoPerfil, email, senha 
      FROM usuario 
      WHERE nome_usuario = :nomeUsuario";

    $params = [
      ':nomeUsuario' => $nomeUsuario,
    ];

    $usuario = BdConexao::query($query, $params)->fetchObject("Usuario");

    if (!$usuario) {
      return ['code' => 404, 'message' => 'Usuário não encontrado'];
    }

    return ['code' => 200, 'usuario' => $usuario];
  }

  static function buscarUsuarioByEmail($email)
  {
    $query = "SELECT 
      id, nome_usuario AS nomeUsuario, nome_completo AS nomeCompleto, data_nascimento AS dataNascimento, genero, foto_perfil AS fotoPerfil, email, senha 
      FROM usuario 
      WHERE email = :email";

    $params = [
      ':email' => $email,
    ];

    $usuario = BdConexao::query($query, $params)->fetchObject("Usuario");

    if (!$usuario) {
      return ['code' => 404, 'message' => 'Usuário não encontrado'];
    }

    return ['code' => 200, 'usuario' => $usuario];
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
