<?php
require_once __DIR__ . '/../controller/loginController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'] ?? '';
    $senha = $_POST['senha'] ?? '';
    LoginController::autenticar($usuario, $senha);
}
?>

<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login - Hotel Winner</title>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined">
  <link rel="stylesheet" href="../css/style.css">

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light border-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img id="nav" alt="Hotel Winner" src="../img/winner.png" height="70">
    </a>
  </div>
</nav>

<div class="card" style="width: 25rem; margin: auto; margin-top: 10%; font-size: 1.1em">
  <div class="card-body">
    <h5 class="card-title">Login</h5>
    <form method="POST" action="">
      <div class="form-group mb-3">
        <label for="userInput">Usuário</label>
        <input type="text" class="form-control" id="userInput" name="usuario" required>
      </div>
      <div class="form-group mb-3">
        <label for="pwInput">Senha</label>
        <input type="password" class="form-control" id="pwInput" name="senha" required>
      </div>
      <button type="submit" class="btn btn-light">Confirmar</button>
    </form>
  </div>
</div>

<script src="../js/login.js"></script>

</body>
</html>
