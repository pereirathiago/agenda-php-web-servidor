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
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-semibold text-gray-800">Seus convites</h2>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                <thead>
                    <tr class="bg-gray-100 border-b">
                        <th class="text-left py-3 px-4 text-gray-600 font-semibold">Titulo</th>
                        <th class="text-left py-3 px-4 text-gray-600 font-semibold">Organizador</th>
                        <th class="text-left py-3 px-4 text-gray-600 font-semibold">Status</th>
                        <th c lass="text-left py-3 px-4 text-gray-600 font-semibold">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (sizeof($convites) != 0) : ?>
                        <?php foreach ($convites as $convite): ?>
                            <tr class="border-b hover:bg-gray-50">
                                <?php if (is_object($convite)) : ?>
                                    <td class="py-3 px-4 text-gray-800"><?= $convite->nomeCompromisso; ?></td>
                                    <td class="py-3 px-4 text-gray-800"><?= $convite->nomeUsuarioOrganizador; ?></td>
                                    <td class="py-3 px-4 text-gray-800">
                                        <?php 
                                        if($convite->statusConvite == 0):
                                            echo '<span class="text-yellow-500">Não confirmado</span>';
                                        elseif($convite->statusConvite == 1):
                                            echo '<span class="text-green-500">Confirmado</span>';
                                        elseif($convite->statusConvite == 2):
                                            echo '<span class="text-red-500">Recusado</span>';
                                        elseif($convite->statusConvite == 3):
                                            echo '<span class="text-gray-500">Cancelado</span>';
                                        endif;
                                        ?>
                                    </td>
                                    <td class="py-3 px-4 text-gray-800 text-center">
                                        <?php if($convite->statusConvite != 3): ?>    
                                            <form action="" method="post" class="inline">
                                                <button type="submit" name="action" value="aceitar" formaction="/convites/aceitar/<?= $convite->id; ?>" class="text-green-600 hover:text-green-800 ml-4">Aceitar</button>
                                                <button type="submit" name="action" value="rejeitar" formaction="/convites/rejeitar/<?= $convite->id; ?>" class="text-yellow-600 hover:text-yellow-800 ml-4">Rejeitar</button>
                                            </form>
                                        <?php else: ?>
                                            <span class="text-gray-500">Cancelado</span>
                                        <?php endif; ?>
                                    </td>
                                <?php endif; ?>
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

        <a href="/" class="mt-6 bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-lg shadow inline-block text-center">
            Voltar
        </a>
    </div>
</div>