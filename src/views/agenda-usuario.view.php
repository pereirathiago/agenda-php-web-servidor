<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: /index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Agenda</title>
</head>
<body>
    <h2>Agenda</h2>
    <form action="/src/controllers/login-usuario.controller.php?action=logout" method="post">
        <button type="submit" name="logoff">Logoff</button>
    </form>
</body>
</html>


