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
                <div class="flex items-center">
                    <h3 class="text-lg font-semibold text-gray-600 mr-4">Convidados:</h3>
                    <input type="button" value="Adicionar convidados" name="cadastrarLocal" onclick="mostrarSelectConvidados()" id="btnAdicionarConvidado" class="p-1 px-3 text-lg bg-gradient-to-r from-blue-500 to-blue-600 text-white font-medium rounded-md shadow-sm hover:shadow-md hover:from-blue-600 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-1 transition-all duration-150 transform hover:scale-105">
                </div>
                <div id="selectConvidados" class="mt-4 hidden">
                    <form method="POST" action="/convidados/adicionar2">
                        <select id="convidadoSelect" name="idConvidado" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="" disabled selected>Selecione um convidado</option>
                            <?php
                            $arrayUsuarios = Usuario::buscarUsuarios();
                            $usuarios = $arrayUsuarios['usuarios'];
                            preencherOptions($usuarios, $dados);
                            ?>
                        </select>
                        <button type="submit" name="adicionarConvidado" class="p-1 px-3 text-lg bg-gradient-to-r from-green-500 to-green-600 text-white font-medium rounded-md shadow-sm hover:shadow-md hover:from-green-600 hover:to-green-700 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-offset-1 transition-all duration-150 transform hover:scale-105">
                            +
                        </button>
                        <button type="button" onclick="cancelarAdicionarConvidado()" class="p-1 px-3 text-lg bg-gradient-to-r from-red-500 to-red-600 text-white font-medium rounded-md shadow-sm hover:shadow-md hover:from-red-600 hover:to-red-700 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-offset-1 transition-all duration-150 transform hover:scale-105">
                            Cancelar
                        </button>
                    </form>
                </div>
            </div>

            <script>
                // Função para exibir o select box e o botão +, escondendo o botão inicial
                function mostrarSelectConvidados() {
                    document.getElementById('btnAdicionarConvidado').classList.add('hidden');
                    document.getElementById('selectConvidados').classList.remove('hidden');
                }

                function cancelarAdicionarConvidado() {
                    document.getElementById('selectConvidados').classList.add('hidden'); // Esconde o seletor de convidados e os botões
                    document.getElementById('btnAdicionarConvidado').classList.remove('hidden'); // Mostra o botão "Adicionar convidados"
                }
            </script>

            <?php if (!empty(Convidado::buscarConvidadosByIdCompromisso($dados['id']))) : ?>
                <ul class="list-disc list-inside text-gray-800">
                    <?php
                    $convidados = Convidado::buscarConvidadosByIdCompromisso($dados['id']);
                    $convidados2 = $convidados['convidados'];
                    foreach ($convidados2 as $convidado) : ?>
                        <li><?= $convidado->nomeUsuarioConvidado; ?> -
                            <?php
                            if ($convidado->statusConvite == 0):
                                echo '<span class="text-yellow-500">Não confirmado</span>';
                            elseif ($convidado->statusConvite == 1):
                                echo '<span class="text-green-500">Confirmado</span>';
                            elseif ($convidado->statusConvite == 2):
                                echo '<span class="text-red-500">Recusado</span>';
                            elseif ($convidado->statusConvite == 3):
                                echo '<span class="text-gray-500">Cancelado</span>';
                            endif;
                            ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php else : ?>
                <p class="text-gray-800">Nenhum convidado</p>
            <?php endif; ?>
        </div>
    </div>
</div>
</div>

<?php
function preencherOptions($arrayUsuarios, $dados)
{
    //pega os convidados para esse compromisso
    $convidados = Convidado::buscarConvidadosByIdCompromisso($dados['id']);
    $convidados2 = $convidados['convidados'] ?? [];

    //pega o usuario logado
    $usuarioLogado = $_SESSION['usuarioLogado'];
    $username = $usuarioLogado->nomeUsuario;

    //cria uma lista com todos os ids dos convidados
    $idsConvidados = [];
    foreach ($convidados2 as $convidado) {
        $idsConvidados[] = $convidado->idUsuarioConvidado;
    }

    //filtra o array de usuarios tirando os que já estão convidados e o usuário logado
    foreach ($arrayUsuarios as $u) {
        // Ignorar o usuário logado e os já convidados
        if ($u->nomeUsuario === $username || in_array($u->id, $idsConvidados)) {
            continue;
        }
        if (is_object($u)) {
            $nomeCompleto = htmlspecialchars($u->nomeCompleto);
            $id = htmlspecialchars($u->id);
            echo "<option value=\"$id\">$nomeCompleto</option>";
        }
    }
}


?>