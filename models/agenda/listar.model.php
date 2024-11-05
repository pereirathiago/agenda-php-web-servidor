<?php
function obterCompromissosDoUsuario($usuarioLogado) {

    if (!isset($usuarioLogado['compromisso']) || empty($usuarioLogado['compromisso'])) {
        return [];
    } else
        return $usuarioLogado['compromisso'];
}


