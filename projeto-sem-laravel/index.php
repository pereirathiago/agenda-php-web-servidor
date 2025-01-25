<?php
require 'vendor/autoload.php'; //esse autoload é pra conseguir fazer referencia às classes sem precisar importar pelo require
date_default_timezone_set('America/Sao_Paulo');
use Pecee\SimpleRouter\SimpleRouter as Router;

require('routes.php');

Router::start();
