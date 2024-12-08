<?php

class ValidarDados
{
  public static function validadarDadosPreenchidos($dados)
  {
    foreach ($dados as $dado) {
      if (!is_bool($dado) && trim($dado) === '') {
        return false;
      }
    }
    return true;
  }

  public static function validarByFilter($dado, $filter)
  {
    if (!filter_var($dado, $filter)) {
      return false;
    }
    return true;
  }

  public static function validarByRegex($dado, $regex)
  {
    if (!preg_match($regex, $dado)) {
      return false;
    }
    return true;
  }
}