<?php
require_once __DIR__ . '/../config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $numero = $_POST['numero'];

    try {
        $sql = "INSERT INTO QUARTO (NUMERACAO, STATUS) 
                VALUES (:numero, :status)";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':numero' => $numero,
            ':status' => 1 // status padrão: 0 (livre ou disponível)
        ]);

        header("Location: ../view/gerenquarto.php");
        exit();
    } catch (PDOException $e) {
        echo "Erro ao cadastrar quarto: " . $e->getMessage();
    }
}