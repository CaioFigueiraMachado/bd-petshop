<?php
require_once("conexao.php");
if (isset($_GET['cod'])) {
    $del = $pdo->prepare("DELETE FROM animal WHERE animal_cod = "?");
    $del->execute([$_GET['cod']]);
}
header("Location: consulta_animal.php");
exit();
?>