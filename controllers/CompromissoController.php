<?php
class CompromissoController {
    use ViewTrait;
    public function cadastrarForm()
    {
      $this->view('compromissos/cadastrar');
    }

    public function cadastrar()
    {
      try {
        if (!isset($_SESSION)) {
          session_start();
        }
  
        $dados = [
          'titulo' => $_POST['titulo'] ?? '',
          'descricao' => $_POST['descricao'] ?? '',
          'dataHoraInicio' => $_POST['dataHoraInicio'] ?? '',
          'dataHoraFim' => $_POST['dataHoraFim'] ?? '',
          'idLocal' => $_POST['idLocal'] ?? ''
        ];
  
        $this->validarDadosCompromisso($dados);
  
        $compromisso = new Compromisso();
        $compromisso->titulo = $dados['titulo'];
        $compromisso->descricao = $dados['descricao'];
        $compromisso->dataHoraInicio = $dados['dataHoraInicio'];
        $compromisso->dataHoraFim = $dados['dataHoraFim'];
        $compromisso->local = $dados['idLocal'];
        $compromisso->idCompromissoOrganizador = $_SESSION['usuarioLogado']->id;

        // $convidados = $_POST['convidados1'] ?? '';
        // if($convidados!=''){
        //     foreach($convidados as $c){

        //     }
        // }
  
        $compromisso->salvarCompromisso($compromisso); //tem que fazer o tr
        header('Location: /');
      } catch (PDOException $e) {
        $error = ErrorsFunctions::handlePDOError($e, $dados);
        $this->view('compromissos/cadastrar', $error);
      } catch (Exception $e) {
        $error = ErrorsFunctions::handleError($e, $dados);
        $this->view('compromissos/cadastrar', $error);
      }
    }

    // public function deletar($id = 0) {
    //     try {
    //       if ($id <= 0) {
    //         throw new Exception("ID inválido {$id}.");
    //       }
    
    //       $compromisso = new Compromisso();
    //       $compromisso->deletarCompromisso($id);
    
    //       header('Location: /locais');
    //     } catch (PDOException $e) {
    //       $error = ErrorsFunctions::handlePDOError($e);
    //       print_r( $error);
    //       // $this->view('local/listar', $error);
    //     } catch (Exception $e) {
    //       $error = ErrorsFunctions::handleError($e);
    //       print_r( $error);
    //       // $this->view('local/listar', $error);
    //     }
    //   }

    private function validarDadosCompromisso($dados)
    {
      if (!ValidarDados::validadarDadosPreenchidos($dados)) {
        throw new Exception('Todos os campos são obrigatórios!');
      }

      //verifica se o compromisso não esta no passado
      if (strtotime($dados['dataHoraInicio']) < strtotime(date('Y-m-d H:i:s'))) {
        throw new Exception('A data e hora de inicio não pode ser no passado.');
      }

      //verifica se o inicio do compromisso não esta no futuro do fim do compromisso
      if (strtotime($dados['dataHoraInicio']) > strtotime($dados['dataHoraFim'])) {
        throw new Exception('A data e hora de inicio não pode ser no futuro do fim do compromisso.');
      }

    }

    public function editarCompromisso()
  {
    try {
      if (!isset($_SESSION)) {
        session_start();
      }

      $dados = [
        'id' => $_POST['id']->id ?? 0,
        'descricao' => $_POST['descricao'] ?? '',
        'titulo' => $_POST['titulo'] ?? '',
        'dataHoraInicio' => $_POST['dataHoraInicio'] ?? '',
        'dataHoraFim' => $_POST['dataHoraFim'] ?? '',
        'idLocal' => $_POST['idLocal'] ?? '',
        'idCompromissoOrganizador' => $_POST['idCompromissoOrganizador'] ?? ''
      ];

      $this->validarDadosCompromisso($dados);

      $compromisso = new Compromisso();
      $compromisso->id = $dados['id'];
      $compromisso->descricao = $dados['descricao'];
      $compromisso->titulo = $dados['titulo'];
      $compromisso->dataHoraInicio = $dados['dataHoraInicio'];
      $compromisso->dataHoraFim = $dados['dataHoraFim'];
      $local = new Local();
        $local = $local->buscarLocais;
        $compromisso->local = $dados['local'];
      $compromisso->idLocal = $dados['idLocal'];
      $compromisso->idCompromissoOrganizador = $dados['idCompromissoOrganizador'];

      header('Location: /compromissos/listar');
      exit();
    } catch (PDOException $e) {
      $error = ErrorsFunctions::handlePDOError($e, $dados);
      $this->view('agenda/listar', $error);
    } catch (Exception $e) {
      $error = ErrorsFunctions::handleError($e, $dados);
      $this->view('agenda/listar', $error);
    }
  }

}
