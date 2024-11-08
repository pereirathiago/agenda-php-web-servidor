<?php
if (!isset($_SESSION)) {
  session_start();
}
if (empty($_SESSION['usuarioLogado']) || $_SESSION['usuarioLogado'] == false) {
  header('Location: /usuarios/login');
}
?>
<?php include('layout/header-nav.php'); ?>
<div class="flex items-center justify-center min-h-screen bg-gray-100">
  <div class="p-6 bg-white rounded-lg shadow-md max-w-md w-full">
    <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Cadastro de Compromisso</h1>
    <form action="/compromissos/cadastrar" method="post" class="space-y-4">
      <?php if (isset($erro) && $erro) : ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
          <strong class="font-bold">Ops!</strong>
          <span class="block sm:inline"><?= $erroMsg ?></span>
        </div>
      <?php endif; ?>
      <div>
        <label for="nome-compromisso" class="block text-gray-700 font-semibold">Nome Do Compromisso:</label>
        <input required type="text" name="nomeCompromisso" placeholder="Digite o nome do compromisso" id="nome-compromisso" class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>
      <div>
        <label for="data-compromisso" class="block text-gray-700 font-semibold">Data do Compromisso:</label>
        <input required min="<?= date('Y-m-d\TH:i'); ?>" type="datetime-local" name="dataCompromisso" id="data-compromisso" class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>
      <div>
        <label for="local" class="block text-gray-700 font-semibold">Local do Compromisso</label>
        <div class="flex">
          <select name="locais" class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <?php
            $arrayLocais = buscarLocais();
            preencherOptionsLocais($arrayLocais);
            ?>
          </select>
          <input type="button" value="Novo Local" name="cadastrarLocal" onclick="redirecionarCadastroLocal()" class="p-4 fs-20 text-xl py-2 bg-blue-600 text-white rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 ml-3">
        </div>
      </div>
      <div>
        <label for="descricao-compromisso" class="block text-gray-700 font-semibold">Descrição do Compromisso:</label>
        <textarea required type="text" name="descricaoCompromisso" placeholder="Digite a descrição do compromisso" id="descricao-compromisso" class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
      </div>
      <div>
        <label for="convidados" class="block text-gray-700 font-semibold">Convidados</label>
        <div class="flex">
          <select name="usuarioConvidado" id="usuarioConvidado" class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option>Sem convidados</option>
            <?php
            $arrayUsuarios = buscarUsuarios();
            preencherOptions($arrayUsuarios);
            ?>
          </select>
          <input type="button" value="+" name="novoConvidado" onclick="adicionarConvidado()" class="p-4 fs-20 text-xl py-2 bg-blue-600 text-white rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 ml-3">
          <input type="hidden" name="convidados1">

          <script>
            function adicionarConvidado() {
              var select = document.getElementById('usuarioConvidado');
              var nomeConvidado = select.options[select.selectedIndex].text;
              var divResultado = document.getElementById('resultado');
              var inputHidden = document.getElementsByName('convidados1');
              if (select.options[select.selectedIndex].text != "Sem convidados") {
                divResultado.innerHTML += `<li>${nomeConvidado}</li>`;
                inputHidden[0].value += nomeConvidado + ',';
              }
            }

            function redirecionarCadastroLocal() {
              location.replace("/local/cadastrar");
            }
          </script>


        </div>
        <ul id="resultado"></ul>
      </div>
      <div>
        <button type="submit" class="w-full py-2 bg-blue-600 text-white rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Cadastrar compromisso</button>
      </div>
    </form>
  </div>
</div>
<?php
function preencherOptions($arrayUsuarios)
{
  //   session_start();
  //   $usuarioLogado = $_SESSION['usuarioLogado'];
  //   $username = $usuarioLogado['nomeCompleto'];
  //   $array = array_filter($arrayUsuarios, function($item) use ($username) {
  //     return $item !== $username;
  // });
  foreach ($arrayUsuarios as $u) {
    $nomeCompleto = $u['nomeCompleto'];
    echo "<option>$nomeCompleto</option>";
  }
}
function preencherOptionsLocais($arrayLocais)
{
  foreach ($arrayLocais as $l) {
    $endereco = $l['endereco'];
    $numero = $l['numero'];
    echo "<option>$endereco, $numero</option>";
  }
}
function adicionarConvidado($usuariosConvidados)
{
  $usuariosConvidados;
}

?>