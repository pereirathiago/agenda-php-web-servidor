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
<?php include('layout/header-nav.php'); ?>

<div class="bg-gray-100 p-6 min-h-screen flex items-start justify-center pt-12">
    <div class="max-w-4xl w-full bg-white shadow-md rounded-lg p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-gray-800">Convidados existentes</h2>
            <a href="/" class="bg-blue-700 hover:bg-blue-500 text-white font-semibold py-2 px-4 rounded-lg shadow">
                Voltar para Lista
            </a>
        </div>

        <div class="space-y-4">
            <div>
                <h3 class="text-lg font-semibold text-gray-600">Nome do convidado:</h3>
                <?php 
                // Garantir que nomeConvidado seja convertido para string, mesmo se for um array
                $nomesConvidados = is_array($dados['nomeConvidado'] ?? null) 
                    ? implode(', ', $dados['nomeConvidado']) 
                    : ($dados['nomeConvidado'] ?? 'Nome não existente');
                ?>
                <p class="text-gray-800"><?= htmlspecialchars($nomesConvidados); ?></p>
            </div>
        </div>
    </div>
</div>
