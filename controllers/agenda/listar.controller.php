<?php

require('models/agenda.model.php');

$compromissos = obterCompromissosDoUsuario();

require ("views.php");