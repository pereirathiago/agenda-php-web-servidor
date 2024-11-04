<div class="flex items-center justify-center min-h-screen bg-gray-100">
  <div class="p-6 bg-white rounded-lg shadow-md max-w-md w-full">
    <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Cadastro de Compromisso</h1>
    <form action="/cadastro-compromisso/gravar" method="post" class="space-y-4">
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
        <select class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
          <?php
          //tem que adicionar dinamicamente os locais dentro dos options
          ?>
            <option>Tem que ter o cadastrar local</option>
        </select>
      </div>
      <div>
        <label for="descricao-compromisso" class="block text-gray-700 font-semibold">Descrição do Compromisso:</label>
        <textarea required type="text" name="descricaoCompromisso" placeholder="Digite a descrição do compromisso" id="descricao-compromisso" class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
      </div>
      <div>
        <label for="convidados" class="block text-gray-700 font-semibold">Convidados</label>
        <select class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
          <?php
          echo ""
          ?>
            <option>Tem que ter o cadastrar usuarios</option>
        </select>
        <button>Novo convidado</button>
      </div>
      <div>
        <button type="submit" class="w-full py-2 bg-blue-600 text-white rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Cadastrar</button>
      </div>
    </form>
    <a href="/login" class="block text-center text-blue-500 hover:underline mt-4">Já tenho uma conta</a>
  </div>
</div>