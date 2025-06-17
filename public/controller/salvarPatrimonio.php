<?php
require_once __DIR__ . '/../config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $valor = $_POST['valor'];
    $status = $_POST['status'];
    $id_quarto = $_POST['id_quarto'];

    // Se "Não aplica" for selecionado, considerar NULL para ID_QUARTO
    if ($id_quarto == 1) {
        $id_quarto = null;
    }

    try {
        $sql = "INSERT INTO patrimonio (NOME, VALOR, STATUS, ID_QUARTO) VALUES (:nome, :valor, :status, :id_quarto)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':valor', $valor);
        $stmt->bindParam(':status', $status, PDO::PARAM_INT);

        if ($id_quarto === null) {
            $stmt->bindValue(':id_quarto', null, PDO::PARAM_NULL);
        } else {
            $stmt->bindParam(':id_quarto', $id_quarto, PDO::PARAM_INT);
        }

        $stmt->execute();

        header("Location: ../view/gerenpatrimonio.php");
        exit();
    } catch (PDOException $e) {
        echo "Erro ao cadastrar patrimônio: " . $e->getMessage();
    }
}
