<script src="https://cdn.tailwindcss.com"></script>
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
        <input required min="<?= date('Y-m-d'); ?>" type="date" name="dataCompromisso" id="data-compromisso" class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>
      <div class="flex items-center space-x-4">
        <input required type="radio" name="genero" id="masculino" class="focus:ring-blue-500">
        <label for="masculino" class="text-gray-700">Masculino</label>
        <input required type="radio" name="genero" id="feminino" class="focus:ring-blue-500">
        <label for="feminino" class="text-gray-700">Feminino</label>
        <input required type="radio" name="genero" id="outro" class="focus:ring-blue-500">
        <label for="outro" class="text-gray-700">Outro</label>
      </div>
      <div>
        <label for="foto-perfil" class="block text-gray-700 font-semibold">Foto de perfil: <small class="text-gray-400">(link começando com "https://")</small></label>
        <input required type="url" name="fotoPerfil" placeholder="https://" id="foto-perfil" class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>
      <div>
        <label for="nome-usuario" class="block text-gray-700 font-semibold">Nome de Usuário:</label>
        <input required type="text" name="nomeUsuario" placeholder="Digite o seu nome de usuario" id="nome-usuario" class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>
      <div>
        <label for="email" class="block text-gray-700 font-semibold">Email:</label>
        <input required type="email" name="email" placeholder="Digite o seu email" id="email" class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>
      <div>
        <label for="senha" class="block text-gray-700 font-semibold">Senha:</label>
        <input required type="password" name="senha" placeholder="Digite a sua senha" id="senha" class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>
      <div>
        <label for="confirmar-senha" class="block text-gray-700 font-semibold">Confirmar Senha:</label>
        <input required type="password" name="confirmarSenha" placeholder="Confirme a sua senha" id="confirmar-senha" class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>
      <div>
        <button type="submit" class="w-full py-2 bg-blue-600 text-white rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Cadastrar</button>
      </div>
    </form>
    <a href="/login" class="block text-center text-blue-500 hover:underline mt-4">Já tenho uma conta</a>
  </div>
</div>