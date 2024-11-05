<?php

require('models/usuarios.model.php');

if($acao == 'logout') {
  logout();
}


require("views.php");
