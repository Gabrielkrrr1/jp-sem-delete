<?php
require_once __DIR__ . '/../config/config.php';

$agendSQL = "SELECT * FROM AGENDAMENTO WHERE deletedat IS NULL";
$agendExecute = $pdo->prepare($agendSQL);
$agendExecute->execute();
$agendamentos = $agendExecute->fetchAll(PDO::FETCH_ASSOC);

$roomsSQL = "SELECT * FROM QUARTO WHERE deletedat IS NULL";
$roomsExecute = $pdo->prepare($roomsSQL);
$roomsExecute->execute();
$rooms = $roomsExecute->fetchAll(PDO::FETCH_ASSOC);

?>