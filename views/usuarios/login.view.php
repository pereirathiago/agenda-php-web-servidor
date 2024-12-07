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
    <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Login</h1>
    <form action="/usuarios/login" method="post">
      <?php if (isset($erro) && $erro) : ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
          <strong class="font-bold">Ops!</strong>
          <span class="block sm:inline"><?= $erroMsg ?></span>
        </div>
        <br>
      <?php endif; ?>
      <label for="usuario" class="block text-gray-700 font-semibold">Usuário:</label>
      <input <?= $dados['usuario'] ?? '' ?> type="text" id="usuario" name="usuario" placeholder="Digite o seu nome de usuario" class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
      <br><br>
      <label for="senha" class="block text-gray-700 font-semibold">Senha:</label>
      <input type="password" id="senha" name="senha" placeholder="Digite a sua senha" class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
      <br><br>
      <div>
        <button type="submit" name="submit" class="w-full py-2 bg-blue-600 text-white rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Entrar</button>
      </div>
      <div>
        <p class="block text-center mt-5 text-gray-700 font-semibold">Não tem uma conta?</p>
        <a href="/usuarios/cadastrar" class="block text-center text-blue-500 hover:underline font-semibold">Cadastrar</a>
      </div>
    </form>
  </div>
</div>