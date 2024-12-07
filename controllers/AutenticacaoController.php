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
        'nomeUsuario' => $_POST['nomeUsuario'] ?? '',
        'senha' => $_POST['senha'] ?? ''
      ];

      

      $autenticacao = new Autenticacao();
      $autenticacao->autenticar($dados['nomeUsuario'], $dados['senha']);
    } catch (PDOException $e) {
      $error = ErrorsFunctions::handlePDOError($e, $dados);
      $this->view('usuarios/login', $error);
    } catch (Exception $e) {
      $error = ErrorsFunctions::handleError($e, $dados);
      $this->view('usuarios/login', $error);
    }
  }
}
