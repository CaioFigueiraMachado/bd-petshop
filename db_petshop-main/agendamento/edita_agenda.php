<?php
require_once("../animal/conexao.php");
if (!isset($_GET['code'])) die("Agendamento não encontrado.");
$code = $_GET['code'];

$stmt = $pdo->prepare("SELECT agendamento_procedimento, agendamento_data FROM agendamento WHERE agendamento_code = ?");
$stmt->execute([$code]);
$agenda = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$agenda) die("Agendamento não encontrado.");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $proc = $_POST['procedimento'];
    $data = $_POST['data'];
    $up = $pdo->prepare("UPDATE agendamento SET agendamento_procedimento = ?, agendamento_data = ? WHERE agendamento_code = ?");
    $up->execute([$proc, $data, $code]);
    header("Location: consulta_agenda.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Editar Agendamento</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Editar Agendamento</h1>
    <form method="POST">
        Procedimento: <input type="text" name="procedimento" value="<?= htmlspecialchars($agenda['agendamento_procedimento']) ?>" required><br><br>
        Data: <input type="date" name="data" value="<?= htmlspecialchars($agenda['agendamento_data']) ?>" required><br><br>
        <button type="submit">Salvar</button>
    </form>
    <a href="consulta_agenda.php">Voltar</a>
</body>
</html>