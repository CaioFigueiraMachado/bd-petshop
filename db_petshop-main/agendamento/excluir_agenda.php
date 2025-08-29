<?php
require_once("../animal/conexao.php");
if (isset($_GET['code'])) {
    $del = $pdo->prepare("DELETE FROM agendamento WHERE agendamento_code = ?");
    $del->execute([$_GET['code']]);
}
header("Location: consulta_agenda.php");
exit();
?>