<?php

require('models/agenda.model.php');

$compromissos = obterCompromissosDoUsuario($usuarioLogado);

require ("views.php");