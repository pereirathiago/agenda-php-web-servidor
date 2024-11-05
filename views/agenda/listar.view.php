<?php
session_start();

if (empty($_SESSION['usuarioLogado']) || $_SESSION['usuarioLogado'] == false) {
    header('Location: /usuarios/login');
}

$usuarioLogado = $_SESSION['usuarioLogado'];

?>

<head>
    <meta charset="UTF-8">
    <title>Agenda</title>
</head>
<h2>Agenda</h2>
<p>Bem-vindo, <?php echo $usuarioLogado['nomeCompleto'] ?>!</p>
<form action="/usuarios/logout" method="post">
    <button type="submit" name="logout">Sair</button>
</form>