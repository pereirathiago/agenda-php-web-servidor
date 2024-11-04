<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form action="/controllers/usuarios/login.controller.php?action=autenticarUsuario" method="post">
        <label for="usuario" class="block text-gray-700 font-semibold">Usuário:</label>
        <input type="text" id="usuario" name="usuario" placeholder="Digite o seu nome de usuario" class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        <br>
        <label for="senha" class="block text-gray-700 font-semibold">Senha:</label>
        <input type="password" id="senha" name="senha" placeholder="Digite a sua senha" class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        <br><br>
        <button type="submit" name="submit" placeholder="Digite a sua senha" class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500">Entrar</button>
    </form>
</body>
</html>
// aaaaa