<div class="flex items-center justify-center min-h-screen bg-gray-100">
<div class="p-6 bg-white rounded-lg shadow-md max-w-md w-full">
<h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Cadastro de Usuário</h1>
    <form action="/controllers/usuarios/login.controller.php?action=autenticarUsuario" method="post">
        <label for="usuario" class="block text-gray-700 font-semibold">Usuário:</label>
        <input type="text" id="usuario" name="usuario" placeholder="Digite o seu nome de usuario" class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        <br>
        <label for="senha" class="block text-gray-700 font-semibold">Senha:</label>
        <input type="password" id="senha" name="senha" placeholder="Digite a sua senha" class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        <br><br>
        <div>
        <button type="submit" name="submit" placeholder="Digite a sua senha" class="w-full py-2 bg-blue-600 text-white rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Entrar</button>
        </div>
    </form>
    </div>
    </div>