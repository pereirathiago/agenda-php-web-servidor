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
            <h2 class="text-2xl font-semibold text-gray-800">Detalhes do Compromisso</h2>
            <a href="/compromissos/listar" class="bg-blue-700 hover:bg-blue-500 text-white font-semibold py-2 px-4 rounded-lg shadow">
                Voltar para Lista
            </a>
        </div>

        <div class="space-y-4">
            <div>
                <h3 class="text-lg font-semibold text-gray-600">Título:</h3>
                <p class="text-gray-800"><?= htmlspecialchars($compromisso->titulo ?? 'Título não informado'); ?></p>
            </div>

            <div>
                <h3 class="text-lg font-semibold text-gray-600">Descrição:</h3>
                <p class="text-gray-800"><?= htmlspecialchars($compromisso->descricao ?? 'Descrição não informada'); ?></p>
            </div>

            <div class="flex space-x-4">
                <div>
                    <h3 class="text-lg font-semibold text-gray-600">Data de Início:</h3>
                    <p class="text-gray-800"><?= isset($compromisso->dataHoraInicio) ? date('d/m/Y H:i', strtotime($compromisso->dataHoraInicio)) : 'Data não informada'; ?></p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-600">Data de Fim:</h3>
                    <p class="text-gray-800"><?= isset($compromisso->dataHoraFim) ? date('d/m/Y H:i', strtotime($compromisso->dataHoraFim)) : 'Data não informada'; ?></p>
                </div>
            </div>

            <div>
                <h3 class="text-lg font-semibold text-gray-600">Convidados:</h3>
                <?php if (!empty($compromisso->convidados)) : ?>
                    <ul class="list-disc list-inside text-gray-800">
                        <?php foreach ($compromisso->convidados as $convidado) : ?>
                            <li><?= htmlspecialchars($convidado->nome); ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php else : ?>
                    <p class="text-gray-800">Nenhum convidado</p>
                <?php endif; ?>
            </div>

            <div>
                <h3 class="text-lg font-semibold text-gray-600">Local:</h3>
                <p class="text-gray-800"><?= htmlspecialchars($compromisso->local->nome ?? 'Local não informado'); ?></p>
            </div>
        </div>

        <div class="mt-6 flex justify-between">
            <a href="/compromissos/editar/<?= $compromisso->id; ?>" class="bg-blue-700 hover:bg-blue-800 text-white font-semibold py-2 px-4 rounded-lg shadow">
                Editar Compromisso
            </a>
            <form action="/compromissos/deletar/<?= $compromisso->id; ?>" method="post" onsubmit="return confirm('Tem certeza que deseja excluir este compromisso?');">
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-lg shadow">
                    Excluir Compromisso
                </button>
            </form>
        </div>
    </div>
</div>
