<?php
class ErrorController
{
    use ViewTrait;

    function error404()
    {
        $dados = [
            'titulo' => 'Página não encontrada',
            'codigo' => 404
        ];
        $this->view('error', $dados);
    }

    function error500()
    {
        $dados = [
            'titulo' => 'Erro interno do servidor',
            'codigo' => 500
        ];
        $this->view('error', $dados);
    }
}
