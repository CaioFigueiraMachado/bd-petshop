<?php
require_once("../animal/conexao.php");
$stmt = $pdo->query("SELECT * FROM cliente");
?>  
<!DOCTYPE html>
<html> 
<head>
    <title>Clientes Cadastrados</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Clientes Cadastrados</h1>
    <table>
        <tr>
            <th>Nome</th>
            <th>Endereço</th>
            <th>Ações</th>
        </tr>
        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
            <tr>
                <td><?= htmlspecialchars($row['cliente_nome']) ?></td>
                <td><?= htmlspecialchars($row['cliente_endereco']) ?></td>
                <td>
                    <a href="edita_cliente.php?cpf=<?= $row['cliente_cpf'] ?>">Editar</a> |
                    <a href="excluir_cliente.php?cpf=<?= $row['cliente_cpf'] ?>" onclick="return confirm('Confirma exclusão?')">Excluir</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
    <a href="../index.php">Voltar</a>
</body>
</html>