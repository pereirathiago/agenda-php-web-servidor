<?php

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
}