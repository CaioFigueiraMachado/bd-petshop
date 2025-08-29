<?php
require_once("conexao.php");
if (!isset($_GET['cod'])) die("Animal não encontrado.");
$cod = $_GET['cod'];

$stmt = $pdo->prepare("SELECT animal_nome, animal_raca FROM animal WHERE animal_cod = ?");
$stmt->execute([$cod]);
$animal = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$animal) die("Animal não encontrado.");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $nome = $_POST['nome'];
    $raca = $_POST['raca'];
    $up = $pdo->prepare("UPDATE animal SET animal_nome = ?, animal_raca = ? WHERE animal_cod = ?");
    $up->execute([$nome, $raca, $cod]);
    header("Location: consulta_animal.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Editar Animal</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Editar Animal</h1>
    <form method="POST">
        Nome: <input type="text" name="nome" value="<?= htmlspecialchars($animal['animal_nome']) ?>" required><br><br>
        Raça: <input type="text" name="raca" value="<?= htmlspecialchars($animal['animal_raca']) ?>" required><br><br>
        <button type="submit">Salvar</button>
    </form>
    <a href="consulta_animal.php">Voltar</a>
</body>
</html>