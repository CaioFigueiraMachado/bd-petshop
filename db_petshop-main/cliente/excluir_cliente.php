<?php
require_once("../animal/conexao.php");
if (isset($_GET['code'])) {
    // Exclui todos os agendamentos relacionados ao cliente primeiro
    $del = $pdo->prepare("DELETE FROM agendamento WHERE fk_cliente_cpf = ?");
    $del->execute([$_GET['code']]);
    
    // Agora exclui o cliente
    $del = $pdo->prepare("DELETE FROM cliente WHERE cliente_cpf = ?");
    $del->execute([$_GET['code']]);
}
header("Location: consulta_cliente.php");
exit();
?>