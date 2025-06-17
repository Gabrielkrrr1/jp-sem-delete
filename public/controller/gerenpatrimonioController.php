<?php
require_once __DIR__ . '/../config/config.php';

$patrimonioSQL = "SELECT * FROM PATRIMONIO WHERE deletedat IS NULL";
$patrimonioExecute = $pdo->prepare($patrimonioSQL);
$patrimonioExecute->execute();
$patrimonios = $patrimonioExecute->fetchAll(PDO::FETCH_ASSOC);

$roomsSQL = "SELECT * FROM QUARTO WHERE deletedat IS NULL";
$roomsExecute = $pdo->prepare($roomsSQL);
$roomsExecute->execute();
$rooms = $roomsExecute->fetchAll(PDO::FETCH_ASSOC);

?>