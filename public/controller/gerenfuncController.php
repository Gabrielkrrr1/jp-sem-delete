<?php
require_once __DIR__ . '/../config/config.php';

$funcSQL = "SELECT * FROM FUNCIONARIO WHERE deletedat IS NULL";
$funcExecute = $pdo->prepare($funcSQL);
$funcExecute->execute();
$funcionarios = $funcExecute->fetchAll(PDO::FETCH_ASSOC);

?>