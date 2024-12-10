<?php

use GuzzleHttp\Psr7\Header;

class ConvidadoController
{
  use ViewTrait;

  public function telaListar() 
  {
    try {
      if (!isset($_SESSION)) {
        session_start();
      }

      $convites = Convidado::buscarConvitesByIdUsuario($_SESSION['usuarioLogado']->id);
      $this->view('convites/listar', $convites);
    } catch (PDOException $e) {
      $error = ErrorsFunctions::handlePDOError($e);
      $this->view('convites/listar', $error);
    } catch (Exception $e) {
      $error = ErrorsFunctions::handleError($e);
      $this->view('convites/listar', $error);
    }
  }

  public function aceitar($id)
  {
    try {
      if (!isset($_SESSION)) {
        session_start();
      }

      $convite = Convidado::buscarConviteById($id);
      $convite->statusConvite = 1;
      $convite->atualizarStatusConvite();

      $this->telaListar();
    } catch (PDOException $e) {
      $error = ErrorsFunctions::handlePDOError($e);
      $this->view('convites/listar', $error);
    } catch (Exception $e) {
      $error = ErrorsFunctions::handleError($e);
      $this->view('convites/listar', $error);
    }
  }

  public function rejeitar($id)
  {
    try {
      if (!isset($_SESSION)) {
        session_start();
      }

      $convite = Convidado::buscarConviteById($id);
      $convite->statusConvite = 2;
      $convite->atualizarStatusConvite();

      $this->telaListar();
    } catch (PDOException $e) {
      $error = ErrorsFunctions::handlePDOError($e);
      $this->view('convites/listar', $error);
    } catch (Exception $e) {
      $error = ErrorsFunctions::handleError($e);
      $this->view('convites/listar', $error);
    }
  }

  public function adicionar()
  {
    try {
      if (!isset($_SESSION)) {
        session_start();
      }

      $convite = [
        'idUsuarioConvidado' => $_POST['usuarioConvidado'] ?? '',
        'statusConvite' => 0,
        'idCompromisso' => $_POST['idCompromisso'] ?? ''
      ];

      Convidado::cadastrarConvidado($convite);

      $this->telaListar();
    } catch (PDOException $e) {
      $error = ErrorsFunctions::handlePDOError($e);
      $this->view('convites/listar', $error);
    } catch (Exception $e) {
      $error = ErrorsFunctions::handleError($e);
      $this->view('convites/listar', $error);
    }
  }

  public function adicionar2()
  {
    try {
      if (!isset($_SESSION)) {
        session_start();
      }

      $convite = [
        'idUsuarioConvidado' => $_POST['usuarioConvidado'] ?? '',
        'statusConvite' => 0,
        'idCompromisso' => $_POST['idCompromisso'] ?? ''
      ];

      Convidado::cadastrarConvidado($convite);
      Header('Location: /compromissos/ver/' . $convite['idCompromisso']);
    } catch (PDOException $e) {
      $error = ErrorsFunctions::handlePDOError($e);
      $this->view('compromissos/ver/', $error);
    } catch (Exception $e) {
      $error = ErrorsFunctions::handleError($e);
      $this->view('compromissos/ver', $error);
    }
  }
}