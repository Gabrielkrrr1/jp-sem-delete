<?php
require_once __DIR__ . '/../config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    try {
        $stmt = $pdo->prepare("UPDATE PRODUTO SET DELETEDAT = NOW() WHERE ID_PRODUTO = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        header("Location: ../view/gerenproduto.php");
        exit();
    } catch (PDOException $e) {
        echo "Erro ao deletar produto: " . $e->getMessage();
    }
}
