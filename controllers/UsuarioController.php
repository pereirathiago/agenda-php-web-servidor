<?php

class UsuarioController
{
  use ViewTrait;

  public function cadastrarForm()
  {
    $this->view('usuarios/cadastrar');
  }

  public function loginForm()
  {
    $this->view('usuarios/login');
  }

  public function cadastrarUsuario()
  {

    $dados = [
      'nomeCompleto' => $_POST['nomeCompleto'] ?? '',
      'dataNascimento' => $_POST['dataNascimento'] ?? '',
      'genero' => $_POST['genero'] ?? '',
      'fotoPerfil' => $_POST['fotoPerfil'] ?? '',
      'nomeUsuario' => $_POST['nomeUsuario'] ?? '',
      'email' => $_POST['email'] ?? '',
      'senha' => $_POST['senha'] ?? '',
      'confirmarSenha' => $_POST['confirmarSenha'] ?? ''
    ];

    try {
      $this->validarDadosUsuario($dados);
    } catch (Exception $e) {
      $erro = true;
      $erroMsg = $e->getMessage();
      $this->view('usuarios/cadastrar', ['erro' => $erro, 'erroMsg' => $erroMsg, 'dados' => $dados]);
      return;
    }

    $usuario = new Usuario();
    $usuario->nomeCompleto = $dados['nomeCompleto'];
    $usuario->nomeUsuario = $dados['nomeUsuario'];
    $usuario->dataNascimento = $dados['dataNascimento'];
    $usuario->genero = $dados['genero'];
    $usuario->fotoPerfil = $dados['fotoPerfil'];
    $usuario->email = $dados['email'];
    $usuario->senha = password_hash($dados['senha'], PASSWORD_DEFAULT);
    
    $usuario->cadastrarUsuario($usuario);
    $this->view('usuarios/login');
  }

  public function buscarUsuarios()
  {
    echo 'Buscar usuários';
  }

  public function buscarUsuarioById()
  {
    echo 'Buscar usuário por ID';
  }

  public function buscarUsuarioByNomeUsuario()
  {
    echo 'Buscar usuário por nome';
  }

  public function buscarUsuarioByEmail()
  {
    echo 'Buscar usuário por email';
  }

  public function editarUsuario()
  {
    echo 'Editar usuário';
  }

  public function deletarUsuario()
  {
    echo 'Deletar usuário';
  }

  private function validarDadosUsuario($dados)
  {
    if (!ValidarDados::validadarDadosPreenchidos($dados)) {
      throw new Exception('Todos os campos são obrigatórios!');
    }

    if (!ValidarDados::validarByFilter($dados['email'], FILTER_VALIDATE_EMAIL)) {
      throw new Exception('Email invalido!');
    }

    if (!ValidarDados::validarByFilter($dados['fotoPerfil'], FILTER_VALIDATE_URL)) {
      throw new Exception('URL inválida');
    }

    if (!ValidarDados::validarByRegex($dados['nomeUsuario'], '/^[a-zA-Z0-9]{2,}$/')) {
      throw new Exception('Nome de usuário pode conter apenas letras, números');
    }

    if (!ValidarDados::validarByRegex($dados['senha'], '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/')) {
      throw new Exception('A senha deve conter pelo menos 8 caracteres, uma letra maiúscula, uma letra minúscula, um número e um caractere especial');
    }

    if ($dados['senha'] != $dados['confirmarSenha']) {
      throw new Exception('As senhas não coincidem');
    }

    if (strtotime($dados['dataNascimento']) > strtotime(date('Y-m-d'))) {
      throw new Exception('A data de nascimento não pode ser no futuro.');
    }
  }
}
