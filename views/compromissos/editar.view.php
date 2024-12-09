<?php
if (!isset($_SESSION)) {
  session_start();
}

?>

<?php include('layout/header-nav.php'); ?>
<script src="https://cdn.tailwindcss.com"></script>
<div class="flex items-center justify-center min-h-screen bg-gray-100 flex-col">
  <div class="p-6 bg-white rounded-lg shadow-md max-w-md w-full m-6">
    <h1 class="text-3xl font-bold text-gray-800 text-center mb-6">Compromisso</h1>

    <form action="/compromissos/editar" method="post" class="space-y-4" id="perfil-form">
      <?php if (isset($erro) && $erro) : ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
          <strong class="font-bold">Ops!</strong>
          <span class="block sm:inline"><?= $erroMsg ?></span>
        </div>
        <br>
      <?php endif; ?>
      <div>
        <label for="titulo" class="block text-gray-700 font-semibold">Nome Do Compromisso:</label>
        <input required type="text" name="titulo" placeholder="Digite o nome do compromisso" id="titulo" class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?= $dados['titulo'] ?? '' ?>">
      </div>

      <div>
        <label for="descricao-compromisso" class="block text-gray-700 font-semibold">Descrição do Compromisso:</label>
        <textarea required type="text" name="descricao" placeholder="Digite a descrição do compromisso" id="descricao-compromisso" class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500"><?= $dados['descricao'] ?? '' ?></textarea>
      </div>

      <div>
        <label for="data-inicio-compromisso" class="block text-gray-700 font-semibold">Data de Inicio do Compromisso:</label>
        <input required min="<?= date('Y-m-d\TH:i'); ?>" type="datetime-local" name="dataHoraInicio" id="data-inicio-compromisso" class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?= $dados['dataHoraInicio'] ?? '' ?>">
      </div>
      <div>
        <label for="data-fim-compromisso" class="block text-gray-700 font-semibold">Data de Fim do Compromisso:</label>
        <input type="datetime-local" name="dataHoraFim" id="data-fim-compromisso" class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?= $dados['dataHoraFim'] ?? '' ?>">
      </div>

      <div>
        <label for="local" class="block text-gray-700 font-semibold">Local do Compromisso</label>
        <div class="flex">
          <select name="idLocal" class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <?php
            $arrayLocais = Local::buscarLocais();
            $locais = $arrayLocais['locais'];
            preencherOptionsLocais($locais);
            ?>
          </select>
          <input type="button" value="Novo Local" name="cadastrarLocal" onclick="redirecionarCadastroLocal()" class="p-4 fs-20 text-xl py-2 bg-blue-600 text-white rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 ml-3">
        </div>
      </div>

      <div>
        <label for="convidados" class="block text-gray-700 font-semibold">Convidados</label>
        <div class="flex">
          <select name="usuarioConvidado" id="usuarioConvidado" class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option>Sem convidados</option>
            <?php
            $arrayUsuarios = Usuario::buscarUsuarios();
            $usuarios = $arrayUsuarios['usuarios'];
            preencherOptions($usuarios);
            print_r($usuarios);
            ?>
          </select>
          <input type="button" value="+" name="novoConvidado" onclick="adicionarConvidado()" class="p-4 fs-20 text-xl py-2 bg-blue-600 text-white rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 ml-3">
          <input type="hidden" name="convidados1">

          <script>
            function adicionarConvidado() {
              var select = document.getElementById('usuarioConvidado');
              var nomeConvidado = select.options[select.selectedIndex].text;
              var idConvidado = select.options[select.selectedIndex].value;
              var divResultado = document.getElementById('resultado');
              var inputHidden = document.getElementsByName('convidados1');
              if (select.options[select.selectedIndex].text != "Sem convidados") {
                divResultado.innerHTML += `<li>${nomeConvidado}</li>`;
                inputHidden[0].value += idConvidado + ',';
              }
            }

            function redirecionarCadastroLocal() {
              location.replace("/local/cadastrar");
            }
          </script>


        </div>
        <ul id="resultado"></ul>
      </div>