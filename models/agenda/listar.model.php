<?php
function obterCompromissosDoUsuario($usuarioLogado) {
    $compromissosPorUsuario = [
        'givas' => [
            ["nome" => "Reunião com o cliente", "data" => "2024-11-10", "local" => "Escritório Central"],
            ["nome" => "Treinamento de Equipe", "data" => "2024-11-15", "local" => "Sala de Treinamento 1"]
        ],
        'thiago' => [
            ["nome" => "Apresentação do Projeto", "data" => "2024-11-12", "local" => "Sala de Conferência B"],
            ["nome" => "Reunião de Feedback", "data" => "2024-11-18", "local" => "Escritório Regional"]
        ]
    ];

    return $compromissosPorUsuario[$usuarioLogado];
}

