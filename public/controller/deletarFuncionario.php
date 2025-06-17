<?php
require_once __DIR__ . '/../config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    try {
        $stmt = $pdo->prepare("UPDATE FUNCIONARIO SET DELETEDAT = NOW() WHERE ID_FUNCIONARIO = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        header("Location: ../view/gerenfunc.php");
        exit();
    } catch (PDOException $e) {
        echo "Erro ao deletar funcionario: " . $e->getMessage();
    }
}
