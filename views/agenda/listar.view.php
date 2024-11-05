<?php
session_start();

if (empty($_SESSION['usuarioLogado']) || $_SESSION['usuarioLogado'] == false) {
  header('Location: /usuarios/login');
}

$usuarioLogado = $_SESSION['usuarioLogado'];
?>

<?php include('layout/header-nav.php'); ?>

<div class="bg-gray-100 p-6 min-h-screen flex items-start justify-center pt-12">
    <div class="max-w-4xl w-full bg-white shadow-md rounded-lg p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-semibold text-gray-800">Agenda de Compromissos</h2>
            <a href="/compromissos/cadastrar" class="bg-blue-700 hover:bg-blue-500 text-white font-semibold py-2 px-4 rounded-lg shadow">
                Cadastrar Compromisso
            </a>
        </div>
        
        <p class="text-gray-600 mb-4">Bem-vindo, <?php echo $_SESSION['usuarioLogado']['nomeCompleto']; ?>!</p>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                <thead>
                    <tr class="bg-gray-100 border-b">
                        <th class="text-left py-3 px-4 text-gray-600 font-semibold">Nome do Compromisso</th>
                        <th class="text-left py-3 px-4 text-gray-600 font-semibold">Data</th>
                        <th class="text-left py-3 px-4 text-gray-600 font-semibold">Local</th>
                        <th class="text-left py-3 px-4 text-gray-600 font-semibold">Descrição</th>
                        <th class="text-left py-3 px-4 text-gray-600 font-semibold">Convidados</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($compromissos)) : ?>
                        <?php foreach ($compromissos as $compromisso): ?>
                            <tr class="border-b hover:bg-gray-50">
                                <td class="py-3 px-4 text-gray-800"><?php echo $compromisso['nomeCompromisso']; ?></td>
                                <td class="py-3 px-4 text-gray-800"><?php echo $compromisso['dataCompromisso']; ?></td>
                                <td class="py-3 px-4 text-gray-800"><?php echo $compromisso['local']; ?></td>
                                <td class="py-3 px-4 text-gray-800"><?php echo $compromisso['descricaoCompromisso']; ?></td>
                                <td class="py-3 px-4 text-gray-800"><?php echo $compromisso['convidados']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="4" class="py-4 px-4 text-center text-gray-600">Nenhum compromisso encontrado.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <form action="/usuarios/logout" method="post" class="mt-6">
            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-lg shadow">
                Sair
            </button>
        </form>
    </div>
</div>