<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: /index.php');
    exit();
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Agenda</title>
</head>
<body>
    <h2>Agenda</h2>
    <p>Bem-vindo, <?php echo $_SESSION['nome']; ?>!</p>
    <form action="/controllers/usuarios/login.controller.php?action=logout" method="post">
        <button type="submit" name="logoff">Logoff</button>
    </form>
</body>
</html>