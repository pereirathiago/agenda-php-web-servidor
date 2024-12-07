<?php
if (!isset($_SESSION)) {
  session_start();
}

if (empty($_SESSION['usuarioLogado']) || $_SESSION['usuarioLogado'] == false) {
  header('Location: /usuarios/login');
}

?>

<?php include('layout/header-nav.php'); ?>

<div class="flex items-center justify-center min-h-screen bg-gray-100 flex-col">
  <div class="p-6 bg-white rounded-lg shadow-md max-w-md w-full m-6">
    <h1 class="text-3xl font-bold text-gray-800 text-center mb-6">Perfil do Usuário</h1>

    <div class="flex items-center justify-center mb-6">
      <div class="w-40 h-40 rounded-lg overflow-hidden border-4 border-blue-500">
        <img src="<?= $_SESSION['usuarioLogado']->fotoPerfil ?>" alt="Foto do usuário" class="w-full h-full object-cover">
      </div>
    </div>

    <hr class="mb-4">

    <form action="/usuarios/editar" method="post" class="space-y-4" id="perfil-form">
      <?php if (isset($erro) && $erro) : ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
          <strong class="font-bold">Ops!</strong>
          <span class="block sm:inline"><?= $erroMsg ?></span>
        </div>
        <br>
      <?php endif; ?>
      <div class="mb-4">
        <label for="nome-completo" class="block text-gray-700 font-semibold">Nome Completo:</label>
        <input required type="text" name="nomeCompleto" placeholder="Digite seu nome completo" id="nome-completo" class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?= $dados ? $dados['nomeCompleto'] : $_SESSION['usuarioLogado']->nomeCompleto ?>" disabled>
      </div>

      <div class="mb-4">
        <label for="data-nascimento" class="block text-gray-700 font-semibold">Data Nascimento:</label>
        <input required type="date" name="dataNascimento" id="data-nascimento" class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?= $dados ? $dados['dataNascimento'] : $_SESSION['usuarioLogado']->dataNascimento ?>" disabled>
      </div>

      <div class="mb-4">
        <label class="block text-gray-700 font-semibold">Gênero:</label>
        <div class="flex items-center space-x-4">
          <input required type="radio" name="genero" id="masculino" class="focus:ring-blue-500" <?= $_SESSION['usuarioLogado']->genero === 'Masculino' ? 'checked' : '' ?> disabled>
          <label for="masculino" class="text-gray-700">Masculino</label>
          <input required type="radio" name="genero" id="feminino" class="focus:ring-blue-500" <?= $_SESSION['usuarioLogado']->genero === 'Feminino' ? 'checked' : '' ?> disabled>
          <label for="feminino" class="text-gray-700">Feminino</label>
          <input required type="radio" name="genero" id="outro" class="focus:ring-blue-500" <?= $_SESSION['usuarioLogado']->genero === 'Outro' ? 'checked' : '' ?> disabled>
          <label for="outro" class="text-gray-700">Outro</label>
        </div>
      </div>

      <div class="mb-4">
        <label for="foto-perfil" class="block text-gray-700 font-semibold">Foto de perfil: <small class="text-gray-400">(link começando com "https://")</small></label>
        <input required type="url" name="fotoPerfil" placeholder="https://" id="foto-perfil" class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?= $dados ? $dados['fotoPerfil'] : $_SESSION['usuarioLogado']->fotoPerfil ?>" disabled>
      </div>

      <div class="mb-4">
        <label for="nome-usuario" class="block text-gray-700 font-semibold">Nome de Usuário:</label>
        <input required type="text" name="nomeUsuario" placeholder="Digite o seu nome de usuario" id="nome-usuario" class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?= $dados ? $dados['nomeUsuario'] : $_SESSION['usuarioLogado']->nomeUsuario ?>" disabled>
      </div>

      <div class="mb-4">
        <label for="email" class="block text-gray-700 font-semibold">Email:</label>
        <input required type="email" name="email" placeholder="Digite o seu email" id="email" class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?= $dados ? $dados['email'] : $_SESSION['usuarioLogado']->email ?>" disabled>
      </div>

      <div class="mb-4">
        <label for="senha" class="block text-gray-700 font-semibold">Senha:</label>
        <input required type="password" name="senha" placeholder="Digite a sua senha" id="senha" class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?= $dados ? $dados['senha'] : "******" ?>" disabled>
      </div>

      <div class="mb-4 hidden" id="confirmar-senha-container">
        <label for="confirmar-senha" class="block text-gray-700 font-semibold">Confirmar Senha:</label>
        <input required type="password" name="confirmarSenha" placeholder="Confirme a sua senha" id="confirmar-senha" class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500" disabled >
      </div>

      <div class="flex justify-center">
        <input type="button" onclick="tornarEditavel()" id="btn-editar" class="px-4 py-2 bg-blue-700 text-white rounded-lg hover:bg-blue-800 transition duration-200" value="Editar">
        <button type="submit" id="salvar-button" class="px-4 py-2 bg-blue-700 text-white rounded-lg hover:bg-blue-800 transition duration-200 hidden">Salvar</button>
      </div>
    </form>
  </div>
  <div class="flex justify-center mb-6">
    <div class="p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg max-w-md w-full">
      <h1 class="text-3xl font-bold text-center mb-4">ALERTA</h1>
      <p class="text-center mb-4">Esta ação é irreversível. Tenha certeza antes de continuar.</p>
      <form action="/usuarios/deletar" method="post" class="flex justify-center">
        <button type="submit" class="px-4 py-2 bg-red-700 text-white rounded-lg hover:bg-red-800 transition duration-200">Deletar Conta</button>
      </form>
    </div>
  </div>
</div>

<script>
  <?php if ($dados) : ?>tornarEditavel();<?php endif; ?>

  function tornarEditavel() {
    const inputs = document.querySelectorAll('#perfil-form input');
    const confirmarSenhaContainer = document.getElementById('confirmar-senha-container');
    const senhaInput = document.getElementById('senha');
    const salvarButton = document.getElementById('salvar-button');
    const editarButton = document.getElementById('btn-editar');
    const nomeUsuario = document.getElementById('nome-usuario');

    inputs.forEach(input => {
      input.disabled = !input.disabled;
    });

    nomeUsuario.disabled = true;
    senhaInput.value = ''; 

    confirmarSenhaContainer.classList.toggle('hidden');
    salvarButton.classList.toggle('hidden');
    editarButton.classList.toggle('hidden');
  }
</script>