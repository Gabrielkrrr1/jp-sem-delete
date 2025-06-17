<?php
require_once __DIR__ . '/../config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $check_in = $_POST['check_in'];
    $check_out = $_POST['check_out'];
    $status = $_POST['status'];
    $quarto = $_POST['quarto'];
    $obs = $_POST['obs'] ?? null;

    try {
        $sql = "INSERT INTO AGENDAMENTO (CHECK_IN, CHECK_OUT, STATUS, ID_QUARTO, OBS) 
                VALUES (:check_in, :check_out, :status, :quarto, :obs)";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':check_in' => $check_in,
            ':check_out' => $check_out,
            ':status' => $status,
            ':quarto' => $quarto,
            ':obs' => $obs
        ]);

        header("Location: ../view/gerenagend.php");
        exit();
    } catch (PDOException $e) {
        echo "Erro ao cadastrar agendamento: " . $e->getMessage();
    }
}
