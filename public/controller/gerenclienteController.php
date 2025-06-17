<?php
require_once __DIR__ . '/../config/config.php';

$clientesSQL = "SELECT * FROM CLIENTE WHERE deletedat IS NULL";
$clientesExecute = $pdo->prepare($clientesSQL);
$clientesExecute->execute();
$clientes = $clientesExecute->fetchAll(PDO::FETCH_ASSOC);

?>