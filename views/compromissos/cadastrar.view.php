<div class="flex items-center justify-center min-h-screen bg-gray-100">
  <div class="p-6 bg-white rounded-lg shadow-md max-w-md w-full">
    <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Cadastro de Compromisso</h1>
    <form action="/compromissos/cadastrar" method="post" class="space-y-4">
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
        <select name="locais" class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
          <?php
            $arrayLocais = [
              "Rua Agostinho Rodrigues Filho, 188 - Vila Clementino", "R. Professor Carrel, 666", "R. Agostinho Rodrigues Filho, 188 - Vila Clementino"
            ];
            preencherOptionsLocais($arrayLocais);
            
          ?>
        </select>
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
            echo "entrou no codigo pra preencher o select";
          //  print_r(buscarUsuarios());
            $arrayUsuarios = [
              "givas" => ["nome" => "Giovanne", "dataNascimento" => "05/11/2005", "genero" => "Masculino", "fotoPerfil" => "https://pt.wikipedia.org/wiki/Lenin", "email" => "mika.2023@alunos.utfpr.edu.br", "senha" => "senha123"],
              "thiago" => ["nome" => "Giovanne", "dataNascimento" => "05/11/2005", "genero" => "Masculino", "fotoPerfil" => "https://pt.wikipedia.org/wiki/Lenin", "email" => "mika.2023@alunos.utfpr.edu.br", "senha" => "senha123"],
              "matheus" => ["nome" => "Giovanne", "dataNascimento" => "05/11/2005", "genero" => "Masculino", "fotoPerfil" => "https://pt.wikipedia.org/wiki/Lenin", "email" => "mika.2023@alunos.utfpr.edu.br", "senha" => "senha123"],
              "danilo" => ["nome" => "Giovanne", "dataNascimento" => "05/11/2005", "genero" => "Masculino", "fotoPerfil" => "https://pt.wikipedia.org/wiki/Lenin", "email" => "mika.2023@alunos.utfpr.edu.br", "senha" => "senha123"],
            ];

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
  foreach ($arrayUsuarios as $key => $value) {
    echo "<option>$key</option>";
  }
}
function preencherOptionsLocais($arrayLocais)
{
  $contador=1;
  foreach ($arrayLocais as $valor) {
    echo "<option>$valor</option>";
    $contador++;
  }
}
function adicionarConvidado($usuariosConvidados)
{
  $usuariosConvidados;
}

?>