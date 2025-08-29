<?php
require_once("../animal/conexao.php");
if (!isset($_GET['cpf'])) die("Cliente não encontrado.");
$cpf = $_GET['cpf'];

$stmt = $pdo->prepare("SELECT cliente_nome, cliente_endereco FROM cliente WHERE cliente_cpf = ?");
$stmt->execute([$cpf]);
$cli = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$cli) die("Cliente não encontrado.");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $nome = $_POST['nome'];
    $end = $_POST['endereco'];
    $up = $pdo->prepare("UPDATE cliente SET cliente_nome = ?, cliente_endereco = ? WHERE cliente_cpf = ?");
    $up->execute([$nome, $end, $cpf]);
    header("Location: consulta_cliente.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Editar Cliente</h1>
    <form method="POST">
        Nome: <input type="text" name="nome" value="<?= htmlspecialchars($cli['cliente_nome']) ?>" required><br><br>
        Endereço: <input type="text" name="endereco" value="<?= htmlspecialchars($cli['cliente_endereco']) ?>" required><br><br>
        <button type="submit">Salvar</button>
    </form>
    <a href="consulta_cliente.php">Voltar</a>
</body>
</html>