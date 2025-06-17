<?php
session_start();
require_once __DIR__ . '/../config/config.php';

class LoginController {
    public static function autenticar($usuario, $senha) {
        global $pdo;

        $sql = "SELECT * FROM FUNCIONARIO WHERE USUARIO = :usuario AND deletedat IS NULL LIMIT 1";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':usuario', $usuario);
        $stmt->execute();

        $funcionario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($funcionario && $senha === $funcionario['SENHA']) {
            $_SESSION['usuario'] = $funcionario['USUARIO'];
            $_SESSION['nivel'] = $funcionario['ID_NIVELACESSO'];
            header("Location: ../view/index.php");
            exit;
        } else {
            echo "<script>alert('Usuário ou senha incorretos.'); window.history.back();</script>";
        }
    }
}
