<?php
$action = $_GET['action'] ?? 'index';
require_once __DIR__ . '/../models/login-usuario.model.php';


function exibirLogin() {
    include __DIR__ . '/../views/login-usuario.view.php';
}

if(isset($_POST['submit'])){
    autenticarUsuario();      
 }

function autenticarUsuario() {
    session_start();



    $usuario = $_POST['usuario'] ?? '';
    $senha = $_POST['senha'] ?? '';
   $usuarioLogando = autenticar($usuario, $senha);

    if ($usuarioLogando) {
        $_SESSION['usuario'] = $usuario;
        $_SESSION['nome'] = $usuarioLogando;
        header('Location: /src/views/agenda-usuario.view.php');
    } else {
        echo 'deu ruim';
    }
 }



 if(isset($_POST['logoff'])){
    logout();      
 }

 function logout() {
    session_start();
    session_destroy();
    header('Location: /index.php');
     exit();
 }



