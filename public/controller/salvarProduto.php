<?php
require_once __DIR__ . '/../config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $valor = $_POST['valor'];

    try {
        $sql = "INSERT INTO produto (NOME, VALOR) VALUES (:nome, :valor)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':nome' => $nome,
            ':valor' => $valor
        ]);

        header("Location: ../view/gerenproduto.php");
        exit();
    } catch (PDOException $e) {
        echo "Erro ao cadastrar produto: " . $e->getMessage();
    }
}
?>
