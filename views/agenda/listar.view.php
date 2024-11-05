<head>
    <meta charset="UTF-8">
    <title>Agenda</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
    <h2>Agenda de Compromissos</h2>
    <p>Bem-vindo, <?php echo $_SESSION['usuario']; ?>!</p>
    
    <table>
        <thead>
            <tr>
                <th>Nome do Compromisso</th>
                <th>Data</th>
                <th>Local</th>
                <th>Descrição</th> 
                <th>Convidados</th> 
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($compromissos)) : ?>
                <?php foreach ($compromissos as $compromisso): ?>
                    <tr>
                        <td><?php echo $compromisso['nomeCompromisso']; ?></td>
                        <td><?php echo $compromisso['dataCompromisso']; ?></td>
                        <td><?php echo $compromisso['local']; ?></td>
                        <td><?php echo $compromisso['descricaoCompromisso']; ?></td>
                        <td><?php echo $compromisso['convidados']; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="4">Nenhum compromisso encontrado.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <?php // só arrumar esse logoff papo de 10s ?>
    <form action="" method="post" style="margin-top: 20px;">
        <button type="submit">Logoff</button>
    </form>
