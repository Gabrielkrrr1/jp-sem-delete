<?php
require_once __DIR__ . '/../config/config.php';

$roomsSQL = "SELECT * FROM QUARTO WHERE deletedat IS NULL";
$roomsExecute = $pdo->prepare($roomsSQL);
$roomsExecute->execute();
$rooms = $roomsExecute->fetchAll(PDO::FETCH_ASSOC);

$data = json_decode(file_get_contents(filename: "php://input"), true);


?>
