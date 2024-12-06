<?php
  require 'vendor/autoload.php'; //esse autoload é pra conseguir fazer referencia às classes sem precisar importar pelo require

  use Pecee\SimpleRouter\SimpleRouter as Router;

  Router::get('/hello-world', 'OlaMundo@msg');

  Router::start();

//   $rota = explode('/', substr($_SERVER['REQUEST_URI'], 1));
//   $recurso = empty($rota[0]) ? 'agenda' : $rota[0];
//   $controlador = "controllers/$recurso.controller.php";
//   $acao = empty($rota[1]) ? "listar" : $rota[1];
//   $acao2 = empty($rota[2]) ? "" : $rota[2];

//   if (file_exists("controllers/{$recurso}/{$acao}.controller.php")) {
//       require("controllers/{$recurso}/{$acao}.controller.php");
//   } else {
//       require("controllers/404.controller.php");
//   }