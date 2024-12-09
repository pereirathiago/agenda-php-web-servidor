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
            <a href="/" class="bg-blue-700 hover:bg-blue-500 text-white font-semibold py-2 px-4 rounded-lg shadow">
                Voltar para Lista
            </a>
        </div>

        <div class="space-y-4">
            <div>
                <h3 class="text-lg font-semibold text-gray-600">Título:</h3>
                <p class="text-gray-800"><?= htmlspecialchars($dados['titulo'] ?? 'Título não informado'); ?></p>
            </div>

            <div>
                <h3 class="text-lg font-semibold text-gray-600">Descrição:</h3>
                <p class="text-gray-800"><?= htmlspecialchars($dados['descricao'] ?? 'Descrição não informada'); ?></p>
            </div>

            <div class="flex space-x-4">
                <div>
                    <h3 class="text-lg font-semibold text-gray-600">Data de Início:</h3>
                    <p class="text-gray-800"><?= date('d/m/Y H:i', strtotime($dados['dataHoraInicio'])); ?></p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-600">Data de Fim:</h3>
                    <p class="text-gray-800"><?= date('d/m/Y H:i', strtotime($dados['dataHoraFim'])); ?></p>
                </div>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-gray-600">Local:</h3>
                <?php
                $local2 = Local::buscarLocalById($dados['idLocal']);
                $local = $local2['local'];
                $endereco = $local->endereco ?? 'Endereço não informado';
                $numero = $local->numero ?? 'N/A';
                $cidade = $local->cidade ?? 'Cidade não informada';
                $estado = $local->estado ?? 'Estado não informado';
                $cep = $local->cep ?? 'CEP não informado';
                ?>
                <p class="text-gray-800"><strong>Endereço:</strong> <?= $endereco ?>, <?= $numero ?></p>
                <p class="text-gray-800"><strong>Cidade:</strong> <?= $cidade ?> - <?= $estado ?></p>
                <p class="text-gray-800"><strong>CEP:</strong> <?= $cep ?></p>
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
        </div>
    </div>
</div>