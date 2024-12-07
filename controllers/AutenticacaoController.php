<?php

class AutenticacaoController
{
  use ViewTrait;

  public function loginForm()
  {
    $this->view('usuarios/login');
  }

  public function login()
  {
    try {
      $dados = [
        'nomeUsuario' => $_POST['usuario'] ?? '',
        'senha' => $_POST['senha'] ?? ''
      ];

      $this->validarDadosLogin($dados);

      $autenticacao = new Autenticacao();
      $autenticacao->autenticar($dados['nomeUsuario'], $dados['senha']);
    
      header('Location: /');
    } catch (PDOException $e) {
      $error = ErrorsFunctions::handlePDOError($e, $dados);
      $this->view('usuarios/login', $error);
    } catch (Exception $e) {
      $error = ErrorsFunctions::handleError($e, $dados);
      $this->view('usuarios/login', $error);
    }
  }

  private function validarDadosLogin($dados)
  {
    if (!ValidarDados::validadarDadosPreenchidos($dados)) {
      throw new Exception('Todos os campos são obrigatórios!');
    }
  }
}
