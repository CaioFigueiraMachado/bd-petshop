<?php
require_once("../animal/conexao.php");
$stmt = $pdo->query("
    SELECT a.agendamento_code, a.agendamento_procedimento, a.agendamento_data,
           an.animal_nome, c.cliente_nome
    FROM agendamento a
    JOIN animal an ON a.fk_animal_code = an.animal_cod
    JOIN cliente c ON a.fk_cliente_cpf = c.cliente_cpf
");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Agendamentos Cadastrados</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Agendamentos Cadastrados</h1>
    <table>
        <tr>
            <th>Procedimento</th>
            <th>Data</th>
            <th>Animal</th>
            <th>Cliente</th>
            <th>Ações</th>
        </tr>
        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
            <tr>
                <td><?= htmlspecialchars($row['agendamento_procedimento']) ?></td>
                <td><?= date('d/m/Y', strtotime($row['agendamento_data'])) ?></td>
                <td><?= htmlspecialchars($row['animal_nome']) ?></td>
                <td><?= htmlspecialchars($row['cliente_nome']) ?></td>
                <td>
                    <a href="edita_agenda.php?code=<?= $row['agendamento_code'] ?>">Editar</a> |
                    <a href="excluir_agenda.php?code=<?= $row['agendamento_code'] ?>" onclick="return confirm('Confirma exclusão?')">Excluir</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
    <a href="../index.php">Voltar</a>
</body>
</html>