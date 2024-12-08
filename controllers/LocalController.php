<?php

class LocalController
{
  use ViewTrait;

  public function telaListar()
  {
    $this->view('local/listar');
  }

  public function telaCadastrar()
  {
    $this->view('local/cadastrar');
  }

  public function cadastrar()
  {
    try {
      if (!isset($_SESSION)) {
        session_start();
      }

      $dados = [
        'cep' => $_POST['cep'] ?? '',
        'endereco' => $_POST['endereco'] ?? '',
        'numero' => $_POST['numero'] ?? 0,
        'semNumero' => isset($_POST['semNumero']) ? true : false,
        'bairro' => $_POST['bairro'] ?? '',
        'cidade' => $_POST['cidade'] ?? '',
        'estado' => $_POST['estado'] ?? ''
      ];

      $this->validarDadosLocal($dados);

      $local = new Local();
      $local->cep = $dados['cep'];
      $local->endereco = $dados['endereco'];
      $local->numero = $dados['numero'];
      $local->semNumero = $dados['semNumero'];
      $local->bairro = $dados['bairro'];
      $local->cidade = $dados['cidade'];
      $local->estado = $dados['estado'];
      $local->idUsuario = $_SESSION['usuarioLogado']->id;

      $local->salvarLocal($local);

      header('Location: /locais');
    } catch (PDOException $e) {
      $error = ErrorsFunctions::handlePDOError($e, $dados);
      $this->view('local/cadastrar', $error);
    } catch (Exception $e) {
      $error = ErrorsFunctions::handleError($e, $dados);
      $this->view('local/cadastrar', $error);
    }
  }

  private function validarDadosLocal($dados)
  {
    if (!ValidarDados::validadarDadosPreenchidos($dados)) {
      throw new Exception('Todos os campos são obrigatórios!');
    }

    if (!ValidarDados::validarByRegex($dados['cep'], '/^[0-9]{8}$/')) {
      throw new Exception('O CEP deve ter apenas 8 dígitos.');
    }

    if (!is_numeric($dados['numero']) && !$dados['semNumero']) {
      throw new Exception('O número deve conter apenas números.');
    }

    if ($dados['numero'] <= 0) {
      throw new Exception('O número tem que ser maior que zero.');
    }
  }
}
