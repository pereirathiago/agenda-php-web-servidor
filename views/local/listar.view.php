<?php
if (!isset($_SESSION)) {
    session_start();
}

if (empty($_SESSION['usuarioLogado']) || $_SESSION['usuarioLogado'] == false) {
    header('Location: /usuarios/login');
    exit();
}

$usuarioLogado = $_SESSION['usuarioLogado'];
?>
<script src="https://cdn.tailwindcss.com"></script>
<?php include('layout/header-nav.php'); ?>

<div class="bg-gray-100 p-6 min-h-screen flex items-start justify-center pt-12">
    <div class="max-w-4xl w-full bg-white shadow-md rounded-lg p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-semibold text-gray-800">Lista de Locais</h2>
            <a href="/local/cadastrar" class="bg-blue-700 hover:bg-blue-500 text-white font-semibold py-2 px-4 rounded-lg shadow">
                Cadastrar Local
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                <thead>
                    <tr class="bg-gray-100 border-b">
                        <th class="text-left py-3 px-4 text-gray-600 font-semibold">CEP</th>
                        <th class="text-left py-3 px-4 text-gray-600 font-semibold">Endereço</th>
                        <th class="text-left py-3 px-4 text-gray-600 font-semibold">Número</th>
                        <th class="text-left py-3 px-4 text-gray-600 font-semibold">Bairro</th>
                        <th class="text-left py-3 px-4 text-gray-600 font-semibold">Cidade</th>
                        <th class="text-left py-3 px-4 text-gray-600 font-semibold">Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($locais)) : ?>
                        <?php foreach ($locais as $local): ?>
                            <tr class="border-b hover:bg-gray-50">
                                <td class="py-3 px-4 text-gray-800"><?php echo $local['cep']; ?></td>
                                <td class="py-3 px-4 text-gray-800"><?php echo $local['endereco']; ?></td>
                                <td class="py-3 px-4 text-gray-800"><?php echo $local['numero']; ?></td>
                                <td class="py-3 px-4 text-gray-800"><?php echo $local['bairro']; ?></td>
                                <td class="py-3 px-4 text-gray-800"><?php echo $local['cidade']; ?></td>
                                <td class="py-3 px-4 text-gray-800"><?php echo $local['estado']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="6" class="py-4 px-4 text-center text-gray-600">Nenhum local encontrado.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <form action="/agenda/listar" method="post" class="mt-6">
            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-lg shadow">
                Voltar
            </button>
        </form>
    </div>
</div>
