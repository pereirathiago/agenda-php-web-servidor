<?php
class Conexao
{
  private static $instancia;

  public static function get()
  {
    try {
      if (!isset(self::$instancia)) {
        $dsn = "mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_NAME']}";
        $user = $_ENV['DB_USER'];
        $password = $_ENV['DB_PASSWORD'];
        
        self::$instancia = new PDO($dsn, $user, $password);
      }
      return self::$instancia;
    } catch (Exception $e) {
      throw new Exception($e->getMessage());
    }
  }
}
