<?php

require('models/agenda.model.php');

$compromissos = Agenda::obterCompromissosDoUsuario();

require ("views.php");