<?php
class BdConexao
{
  private static $instancia;

  public static function get()
  {
    try {
      if (!isset(self::$instancia)) {
        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
        $dotenv->load();

        $db_host = $_ENV['DB_HOST'];
        $db_name = $_ENV['DB_NAME'];
        $user = $_ENV['DB_USER'];
        $password = $_ENV['DB_PASSWORD'];
        $dsn = "mysql:host={$db_host};dbname={$db_name}";

        self::$instancia = new PDO($dsn, $user, $password);
      }
      return self::$instancia;
    } catch (Exception $e) {
      throw new Exception($e->getMessage());
    }
  }

  public function query($query, $params = [])
  {
    $stmt = $this->get()->prepare($query);
    $stmt->execute($params);
    return $stmt;
  }
}
