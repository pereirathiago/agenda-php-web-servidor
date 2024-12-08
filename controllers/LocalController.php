<?php

class LocalController
{
  use ViewTrait;

  public function telaListar()
  {
    try {
      if (!isset($_SESSION)) {
        session_start();
      }

      $locais = Local::buscarLocalByIdUsuario($_SESSION['usuarioLogado']->id);
      $this->view('local/listar', $locais);
    } catch (PDOException $e) {
      $error = ErrorsFunctions::handlePDOError($e);
      $this->view('local/listar', $error);
    } catch (Exception $e) {
      $error = ErrorsFunctions::handleError($e);
      $this->view('local/listar', $error);
    }
  }

  public function telaCadastrar()
  {
    $this->view('local/cadastrar');
  }

  public function telaEditar($id)
  {
    try {
      if ($id <= 0) {
        throw new Exception("ID inválido {$id}.");
      }

      $local = Local::buscarLocalById($id);

      if($local['code'] !== 200) {
        throw new Exception($local['message']);
      }

      $dados = [
        'id' => $local['local']->id,
        'cep' => $local['local']->cep,
        'endereco' => $local['local']->endereco,
        'numero' => $local['local']->numero,
        'semNumero' => $local['local']->semNumero,
        'bairro' => $local['local']->bairro,
        'cidade' => $local['local']->cidade,
        'estado' => $local['local']->estado
      ];

      $this->view('local/cadastrar', $dados);
    } catch (PDOException $e) {
      $error = ErrorsFunctions::handlePDOError($e);
      $this->view('local/cadastrar', $error);
    } catch (Exception $e) {
      $error = ErrorsFunctions::handleError($e);
      $this->view('local/cadastrar', $error);
    }
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

  public function editar($id) {
    try {
      if (!isset($_SESSION)) {
        session_start();
      }

      $dados = [
        'id' => $id,
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
      $local->id = $dados['id'];
      $local->cep = $dados['cep'];
      $local->endereco = $dados['endereco'];
      $local->numero = $dados['numero'];
      $local->semNumero = $dados['semNumero'];
      $local->bairro = $dados['bairro'];
      $local->cidade = $dados['cidade'];
      $local->estado = $dados['estado'];
      $local->idUsuario = $_SESSION['usuarioLogado']->id;

      $local->editarLocal($local);

      header('Location: /locais');
    } catch (PDOException $e) {
      $error = ErrorsFunctions::handlePDOError($e, $dados);
      $this->view('local/cadastrar', $error);
    } catch (Exception $e) {
      $error = ErrorsFunctions::handleError($e, $dados);
      $this->view('local/cadastrar', $error);
    }
  }

  public function deletar($id = 0)
  {
    try {
      if ($id <= 0) {
        throw new Exception("ID inválido {$id}.");
      }

      $local = new Local();
      $local->deletarLocal($id);

      header('Location: /locais');
    } catch (PDOException $e) {
      $error = ErrorsFunctions::handlePDOError($e);
      print_r($error);
      // $this->view('local/listar', $error);
    } catch (Exception $e) {
      $error = ErrorsFunctions::handleError($e);
      print_r($error);
      // $this->view('local/listar', $error);
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

    if($dados['id'] > 0) {
      $local = Local::buscarLocalByIdUsuarioId($dados['id'], $_SESSION['usuarioLogado']->id);

      if($local['code'] !== 200) {
        throw new Exception($local['message']);
      }
    }
  }
}
