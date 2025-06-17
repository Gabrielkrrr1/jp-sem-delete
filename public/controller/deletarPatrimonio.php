<?php
require_once __DIR__ . '/../config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    try {
        $stmt = $pdo->prepare("UPDATE PATRIMONIO SET DELETEDAT = NOW() WHERE ID_PATRIMONIO = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        header("Location: ../view/gerenpatrimonio.php");
        exit();
    } catch (PDOException $e) {
        echo "Erro ao deletar patrimonio: " . $e->getMessage();
    }
}
