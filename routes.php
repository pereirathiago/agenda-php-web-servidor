<?php

use Pecee\Http\Request;
use Pecee\SimpleRouter\SimpleRouter as Router;

// hello world
Router::get('/hello-world', 'OlaMundo@msg');

// usuarios
Router::get('/usuarios/cadastrar', 'UsuarioController@cadastrarForm');
Router::get('/usuarios/login', 'UsuarioController@loginForm');
Router::post('/usuarios/cadastrar', 'UsuarioController@cadastrarUsuario');

// erros
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