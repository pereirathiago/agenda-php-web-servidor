<?php

class AgendaController
{
  use ViewTrait;

  public function agendaTela()
  {
    try {
      if (!isset($_SESSION)) {
        session_start();
      }

      $compromissos = Compromisso::buscarCompromissoByIdUsuario($_SESSION['usuarioLogado']->id);
      $this->view('agenda/listar', $compromissos);
    } catch (PDOException $e) {
      $error = ErrorsFunctions::handlePDOError($e);
      $this->view('agenda/listar', $error);
    } catch (Exception $e) {
      $error = ErrorsFunctions::handleError($e);
      $this->view('agenda/listar', $error);
    }
  }
} 