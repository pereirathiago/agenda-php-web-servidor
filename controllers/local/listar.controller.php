<?php

require('models/local.model.php');

$locais = Local::buscarLocais();

require ("views.php");