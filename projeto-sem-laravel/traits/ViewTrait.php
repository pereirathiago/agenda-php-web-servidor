<?php

trait ViewTrait
{
  public function view($nome, $dados = []) 
  {
    foreach ($dados as $key => $value) {
      ${$key} = $value;
    }
    include('layout/header.php');
    require "./views/{$nome}.view.php";
    include('layout/footer.php');
  }
}
