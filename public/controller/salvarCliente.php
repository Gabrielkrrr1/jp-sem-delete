<?php
require_once __DIR__ . '/../config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $data_nascimento = $_POST['data_nascimento'];
    $fiador = $_POST['fiador'];
    $contato = $_POST['contato'];
    $documento = $_POST['documento'];
    $tipo_documento = $_POST['tipo_documento'];
    $obs = $_POST['obs'] ?? null;

    try {
        $sql = "INSERT INTO CLIENTE (NOME, DATA_NASCIMENTO, FIADOR, CONTATO, DOCUMENTO, TIPO_DOCUMENTO, OBS)
                VALUES (:nome, :data_nascimento, :fiador, :contato, :documento, :tipo_documento, :obs)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':nome' => $nome,
            ':data_nascimento' => $data_nascimento,
            ':fiador' => $fiador,
            ':contato' => $contato,
            ':documento' => $documento,
            ':tipo_documento' => $tipo_documento,
            ':obs' => $obs
        ]);

        // Redireciona de volta à página principal após cadastro
        header("Location: ../view/gerencliente.php");
        exit();
    } catch (PDOException $e) {
        echo "Erro ao cadastrar cliente: " . $e->getMessage();
    }
}
