<?php
require_once __DIR__ . '/../config/config.php';

$produtosSQL = "SELECT * FROM PRODUTO WHERE deletedat IS NULL";
$produtosExecute = $pdo->prepare($produtosSQL);
$produtosExecute->execute();
$produtos = $produtosExecute->fetchAll(PDO::FETCH_ASSOC);

?>