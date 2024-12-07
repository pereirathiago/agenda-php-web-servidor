<?php

class ErrorsFunctions
{
  public static function handleError($e, $dados)
  {
    $erro = true;
    $erroMsg = $e->getMessage();
    return ['erro' => $erro, 'erroMsg' => $erroMsg, 'dados' => $dados];
  }

  public static function handlePDOError($e, $dados)
  {
    $erro = true;
    switch ($e->getCode()) {
      case 23000:
        $erroMsg = 'Já existe um usuário com este email ou nome de usuário.';
        break;
      default:
        $erroMsg = 'Erro no banco de dados: ' . $e->getMessage();
        break;
    }
    return ['erro' => $erro, 'erroMsg' => $erroMsg, 'dados' => $dados];
  }
}
