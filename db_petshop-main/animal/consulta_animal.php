<?php
require_once("conexao.php");
$stmt = $pdo->query("
    SELECT a.animal_cod, a.animal_nome, a.animal_raca, c.cliente_nome
    FROM animal a
    JOIN cliente c ON a.fk_cliente_cpf = c.cliente_cpf
");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Animais Cadastrados</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Animais Cadastrados</h1>
    <table>
        <tr>
            <th>Nome</th>
            <th>Raça</th>
            <th>Dono</th>
            <th>Ações</th>
        </tr>
        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
            <tr>
                <td><?= htmlspecialchars($row['animal_nome']) ?></td>
                <td><?= htmlspecialchars($row['animal_raca']) ?></td>
                <td><?= htmlspecialchars($row['cliente_nome']) ?></td>
                <td>
                    <a href="edita_animal.php?cod=<?= $row['animal_cod'] ?>">Editar</a> |
                    <a href="excluir_animal.php?cod=<?= $row['animal_cod'] ?>" onclick="return confirm('Confirma exclusão?')">Excluir</a>
                </td>   
            </tr>
        <?php endwhile; ?>
    </table>
    <a href="../index.php">Voltar</a>
</body>
</html>