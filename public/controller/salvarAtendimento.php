<?php
require_once __DIR__ . '/../config/config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST' && !isset($_GET['action'])) {
    exit;
}

header('Content-Type: application/json');

try {
    $action = $_GET['action'] ?? $_POST['action'] ?? 'read';
    
    switch ($action) {
        case 'create':
            createAtendimento($pdo);
            break;
        default:
            echo json_encode(['success' => false]);
    }
} catch (Exception $e) {
    echo json_encode(['success' => false]);
}

function createAtendimento($pdo) {
    $pdo->beginTransaction();
    
    try {
        $clienteSQL = "INSERT INTO cliente (NOME, DATA_NASCIMENTO, FIADOR, CONTATO, DOCUMENTO, TIPO_DOCUMENTO, OBS, createdat) 
                       VALUES (?, ?, ?, ?, ?, ?, ?, NOW())";
        
        $clienteStmt = $pdo->prepare($clienteSQL);
        $clienteStmt->execute([
            $_POST['nome'],
            $_POST['data_nascimento'],
            $_POST['fiador'],
            $_POST['contato'],
            $_POST['documento'],
            $_POST['tipo_documento'],
            $_POST['obs'] ?? ''
        ]);
        
        $clienteId = $pdo->lastInsertId();
        
        if (isset($_POST['clientes_extras']) && is_array($_POST['clientes_extras'])) {
            foreach ($_POST['clientes_extras'] as $clienteExtra) {
                if (!empty($clienteExtra['nome']) && !empty($clienteExtra['documento'])) {
                    $extraStmt = $pdo->prepare($clienteSQL);
                    $extraStmt->execute([
                        $clienteExtra['nome'],
                        $_POST['data_nascimento'],
                        $_POST['fiador'],
                        $_POST['contato'],
                        $clienteExtra['documento'],
                        $clienteExtra['tipo_documento'],
                        $clienteExtra['obs'] ?? ''
                    ]);
                }
            }
        }
        
        $agendamentoSQL = "INSERT INTO agendamento (ID_CLIENTE, CHECK_IN, CHECK_OUT, OBS, STATUS, ID_QUARTO, createdat) 
                           VALUES (?, ?, ?, ?, 1, ?, NOW())";
        
        $agendamentoStmt = $pdo->prepare($agendamentoSQL);
        $agendamentoStmt->execute([
            $clienteId,
            $_POST['check_in'],
            $_POST['check_out'],
            $_POST['obs_agendamento'] ?? '',
            $_POST['id_quarto']
        ]);

        $updateRoomSQL = "UPDATE quarto SET STATUS = 1, updatedat = NOW() WHERE ID_QUARTO = ?";
        $updateRoomStmt = $pdo->prepare($updateRoomSQL);
        $updateRoomStmt->execute([$_POST['id_quarto']]);
        
        $pdo->commit();
        
        echo json_encode(['success' => true]);
        
    } catch (Exception $e) {
        $pdo->rollback();
        echo json_encode(['success' => false]);
    }
}
?>
