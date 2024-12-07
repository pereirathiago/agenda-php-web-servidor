<?php

class AgendaController
{
  use ViewTrait;

  public function agendaTela()
  {
    $this->view('agenda/listar');
  }
} 