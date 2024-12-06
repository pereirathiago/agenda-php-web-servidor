<?php
require 'vendor/autoload.php'; //esse autoload é pra conseguir fazer referencia às classes sem precisar importar pelo require

use Pecee\SimpleRouter\SimpleRouter as Router;

require('routes.php');

Router::start();
