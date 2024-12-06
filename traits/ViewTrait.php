<?php

trait ViewTrait
{
  public function view($nome, $dados = []) 
  {
    foreach ($dados as $key => $value) {
      ${$key} = $value;
    }
    return require "./views/{$nome}.view.php";
  }
}
