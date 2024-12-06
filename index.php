<?php
require 'vendor/autoload.php'; //esse autoload é pra conseguir fazer referencia às classes sem precisar importar pelo require

use Pecee\Http\Request;
use Pecee\SimpleRouter\SimpleRouter as Router;

Router::get('/hello-world', 'OlaMundo@msg');

Router::get('/usuarios/cadastrar', 'UsuarioController@cadastrarForm');
Router::post('/usuarios/cadastrar', 'UsuarioController@cadastrarUsuario');
Router::get('/usuarios/login', 'UsuarioController@loginForm');

Router::get('/404', 'ErrorController@error404');
Router::get('/500', 'ErrorController@error500');

Router::error(function (Request $request, \Exception $exception) {
  switch ($exception->getCode()) {
    case 404:
      Router::response()->redirect('/404');
    default:
      Router::response()->redirect('/500');
  }
});

Router::start();
