
function autenticar($usuario, $senha)
{
  $usuarios = include('usuarios/usuarios.php');

  foreach ($usuarios as $u) {
    if ($u['usuario'] === $usuario && $u['senha'] === $senha) {
      return $u['nome'];
    }
  }
  return false;
}

function logout()
{
  session_start();
  session_destroy();
  header('Location: /usuarios/login');
  exit();
}

function salvarUsuario($dados) {
  session_start();

  if (!isset($_SESSION['usuarios'])) {
      $_SESSION['usuarios'] = [];
  }

  $_SESSION['usuarios'][] = $dados;
}
