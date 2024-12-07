<?php
if (!isset($_SESSION)) {
  session_start();
}
if (isset($_SESSION['usuarioLogado']) && $_SESSION['usuarioLogado'] == true) {
  header('Location: /');
  exit();
}
?>

<div class="flex items-center justify-center min-h-screen bg-gray-100">
  <div class="p-6 bg-white rounded-lg shadow-md max-w-md w-full">
    <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Cadastro de Usuário</h1>
    <form action="/usuarios/cadastrar" method="post" class="space-y-4">
      <?php if (isset($erro) && $erro) : ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
          <strong class="font-bold">Ops!</strong>
          <span class="block sm:inline"><?= $erroMsg ?></span>
        </div>
        <br>
      <?php endif; ?>
      <div>
        <label for="nome-completo" class="block text-gray-700 font-semibold">Nome Completo:</label>
        <input value="<?= $dados['nomeCompleto'] ?? '' ?>" required type="text" name="nomeCompleto" placeholder="Digite seu nome completo" id="nome-completo" class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>
      <div>
        <label for="data-nascimento" class="block text-gray-700 font-semibold">Data de Nascimento:</label>
        <input value="<?= $dados['dataNascimento'] ?? '' ?>" required type="date" name="dataNascimento" id="data-nascimento" class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>
      <div class="flex items-center space-x-4">
        <label for="genero" class="block text-gray-700 font-semibold">Gênero:</label>
        <input required type="radio" name="genero" id="masculino" class="focus:ring-blue-500">
        <label for="masculino" class="text-gray-700">Masculino</label>
        <input required type="radio" name="genero" id="feminino" class="focus:ring-blue-500">
        <label for="feminino" class="text-gray-700">Feminino</label>
        <input required type="radio" name="genero" id="outro" class="focus:ring-blue-500">
        <label for="outro" class="text-gray-700">Outro</label>
      </div>
      <div>
        <label for="foto-perfil" class="block text-gray-700 font-semibold">Foto de perfil: <small class="text-gray-400">(Link começando com "https://")</small></label>
        <input value="<?= $dados['fotoPerfil'] ?? '' ?>" required type="url" name="fotoPerfil" placeholder="https://" id="foto-perfil" class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>
      <div>
        <label for="nome-usuario" class="block text-gray-700 font-semibold">Nome de Usuário:</label>
        <input value="<?= $dados['nomeUsuario'] ?? '' ?>" required type="text" name="nomeUsuario" placeholder="Digite o seu nome de usuario" id="nome-usuario" class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>
      <div>
        <label for="email" class="block text-gray-700 font-semibold">Email:</label>
        <input value="<?= $dados['email'] ?? '' ?>" required type="email" name="email" placeholder="Digite o seu email" id="email" class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>
      <div>
        <label for="senha" class="block text-gray-700 font-semibold">Senha:</label>
        <input value="<?= $dados['senha'] ?? '' ?>" required type="password" name="senha" placeholder="Digite a sua senha" id="senha" class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>
      <div>
        <label for="confirmar-senha" class="block text-gray-700 font-semibold">Confirmar Senha:</label>
        <input value="<?= $dados['confirmarSenha'] ?? '' ?>" required type="password" name="confirmarSenha" placeholder="Confirme a sua senha" id="confirmar-senha" class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>
      <div>
        <button type="submit" class="w-full py-2 bg-blue-600 text-white rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Cadastrar</button>
      </div>
    </form>
    <a href="/usuarios/login" class="block text-center text-blue-500 hover:underline mt-4">Já tenho uma conta</a>
  </div>
</div>