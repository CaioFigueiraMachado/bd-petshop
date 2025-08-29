<?php
$host = "localhost";
$dbname = "db_petshop";
$user = "root";
$pass = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    // Não precisa de echo aqui
} catch(PDOException $e) {
    die("Erro ao conectar: " . $e->getMessage());
}
?>