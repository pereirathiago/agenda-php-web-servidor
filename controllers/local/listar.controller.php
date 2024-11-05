<?php

require('models/local.model.php');

$locais = buscarLocais();

require ("views.php");