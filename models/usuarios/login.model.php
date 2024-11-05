<?php
function autenticar($usuario, $senha) {
    $usuarios = include('usuarios.php');

    foreach ($usuarios as $u) {
        if ($u['usuario'] === $usuario && $u['senha'] === $senha) {
            return $u['nome'];
        }
    }
    return false; 
}
