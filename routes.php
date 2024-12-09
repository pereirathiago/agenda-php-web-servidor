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
Router::post('/usuarios/deletar', 'UsuarioController@deletarUsuario');

//compromissos
Router::get('/compromissos/cadastrar', 'CompromissoController@cadastrarForm');
Router::post('/compromissos/cadastrar', 'CompromissoController@cadastrar');
Router::get('/compromissos/editar/{id}', 'CompromissoController@telaEditar');
Router::post('/compromissos/editar/{id}', 'CompromissoController@editar');
Router::post('/compromissos/deletar/{id}', 'CompromissoController@deletar');
Router::get('/compromissos/ver/{id}', 'CompromissoController@telaVisualizar');

// autenticacao
Router::get('/usuarios/login', 'AutenticacaoController@loginForm');
Router::post('/usuarios/login', 'AutenticacaoController@login');
Router::post('/usuarios/logout', 'AutenticacaoController@logout');

// locais
Router::get('/locais', 'LocalController@telaListar');
Router::get('/locais/cadastrar', 'LocalController@telaCadastrar');
Router::get('/locais/editar/{id}', 'LocalController@telaEditar');
Router::post('/locais/editar/{id}', 'LocalController@editar');
Router::post('/locais/cadastrar', 'LocalController@cadastrar');
Router::post('/locais/deletar/{id}', 'LocalController@deletar');

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