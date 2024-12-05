<?php

require('models/usuarios.php');

if($acao == 'logout') {
  $usuario = new Usuario();
  $usuario->logout();
}


require("views.php");
