<?php
if (!isset($_SESSION)) {
  session_start();
}

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

    <p class="text-gray-600 mb-4">Bem-vindo, <?php echo $_SESSION['usuarioLogado']->nomeCompleto; ?>!</p>

    <div class="overflow-x-auto">
      <table class="min-w-full bg-white border border-gray-200 rounded-lg">
        <thead>
          <tr class="bg-gray-100 border-b">
            <th class="text-left py-3 px-4 text-gray-600 font-semibold">Nome do Compromisso</th>
            <th class="text-left py-3 px-4 text-gray-600 font-semibold">Data e Hora de Inicio</th>
            <th class="text-left py-3 px-4 text-gray-600 font-semibold">Data e Hora de Fim</th>
            <th class="text-left py-3 px-4 text-gray-600 font-semibold">Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php if (sizeof($compromissos) != 0) : ?>
            <?php foreach ($compromissos as $compromisso): ?>
              <tr class="border-b hover:bg-gray-50">
              <?php if (is_object($compromisso)) : ?>
                <td class="py-3 px-4 text-gray-800"><?= $compromisso->titulo; ?></td>
                <td class="py-3 px-4 text-gray-800"><?= date('d/m/Y H:i', strtotime($compromisso->dataHoraInicio));  ?></td>
                <td class="py-3 px-4 text-gray-800"><?= date('d/m/Y H:i', strtotime($compromisso->dataHoraFim));  ?></td>
                <td class="py-3 px-4 text-gray-800">
                <a href="/compromissos/editar/<?= $compromisso->id; ?>" class="text-green-600 hover:text-green-800">Editar</a>
                                        <a href="/compromissos/ver/<?= $compromisso->id; ?>" class="text-blue-600 hover:text-blue-800 ml-5">Ver</a>
                                        <form action="/compromissos/deletar/<?= $compromisso->id; ?>" method="post" class="inline" onsubmit="return confirm('Tem certeza que deseja excluir este compromisso?');">
                                            <button type="submit" class="text-red-600 hover:text-red-800 ml-5">Excluir</button>
                                        </form>
                                    </td>
                <?php endif; ?>
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