
<?php

session_start();
require_once __DIR__ . '/../../models/agenda/listar.model.php';

if (!isset($_SESSION['usuario'])) {
    header('Location: /index.php');
    exit();
}

$usuarioLogado = $_SESSION['usuario'];

$compromissos = obterCompromissosDoUsuario($usuarioLogado);

require_once __DIR__ . '/../../views/agenda/listar.view.php';
