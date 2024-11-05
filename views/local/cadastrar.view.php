<script src="https://cdn.tailwindcss.com"></script>

<div class="flex items-center justify-center min-h-screen bg-gray-100">
  <div class="p-6 bg-white rounded-lg shadow-md max-w-md w-full">
    <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Cadastro de Local</h1>
    <form action="/local/cadastrar" method="post" class="space-y-4">
      <div>
        <label for="cep" class="block text-gray-700 font-semibold">CEP:</label>
        <input required type="text" name="cep" placeholder="Digite o CEP" id="cep" class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>
      <div>
        <label for="endereco" class="block text-gray-700 font-semibold">Endereço:</label>
        <input required type="text" name="endereco" placeholder="Digite o endereço" id="endereco" class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>
      <div>
        <label for="numero" class="block text-gray-700 font-semibold">Número:</label>
        <input required type="text" name="numero" placeholder="Digite o número" id="numero" class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>
      <div>
        <label for="bairro" class="block text-gray-700 font-semibold">Bairro:</label>
        <input required type="text" name="bairro" placeholder="Digite o bairro" id="bairro" class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>
      <div>
        <label for="cidade" class="block text-gray-700 font-semibold">Cidade:</label>
        <input required type="text" name="cidade" placeholder="Digite a cidade" id="cidade" class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>
      <div>
        <label for="estado" class="block text-gray-700 font-semibold">Estado:</label>
        <input required type="text" name="estado" placeholder="Digite o estado" id="estado" class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>
      <div>
        <button type="submit" name ="cadastrarLocal" class="w-full py-2 bg-blue-600 text-white rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Cadastrar Local</button>
      </div>
    </form>
  </div>
</div>
