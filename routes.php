<?php

use Pecee\Http\Request;
use Pecee\SimpleRouter\SimpleRouter as Router;

// agenda
Router::get('/', 'AgendaController@agendaTela');

// hello world
Router::get('/hello-world', 'OlaMundo@msg');

// usuarios
Router::get('/usuarios/cadastrar', 'UsuarioController@cadastrarForm');
Router::post('/usuarios/cadastrar', 'UsuarioController@cadastrarUsuario');
Router::post('/usuarios/editar', 'UsuarioController@editarUsuario');
Router::get('/perfil', 'UsuarioController@perfilForm');

// autenticacao
Router::get('/usuarios/login', 'AutenticacaoController@loginForm');
Router::post('/usuarios/login', 'AutenticacaoController@login');
Router::post('/usuarios/logout', 'AutenticacaoController@logout');

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