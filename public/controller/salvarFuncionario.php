<?php
require_once __DIR__ . '/../config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $confirmar_senha = $_POST['confirmar_senha'];
    $nivel_acesso = isset($_POST['nivel_acesso']) ? 1 : 0;

    // Confirmação de senha
    if ($senha !== $confirmar_senha) {
        echo "Erro: As senhas não coincidem!";
        exit();
    }

    try {
        $sql = "INSERT INTO funcionario (USUARIO, SENHA, ID_NIVELACESSO) 
                VALUES (:usuario, :senha, :nivel)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':usuario' => $usuario,
            ':senha' => $senha,
            ':nivel' => $nivel_acesso
        ]);

        header("Location: ../view/gerenfunc.php");
        exit();
    } catch (PDOException $e) {
        echo "Erro ao cadastrar funcionário: " . $e->getMessage();
    }
}
?>
