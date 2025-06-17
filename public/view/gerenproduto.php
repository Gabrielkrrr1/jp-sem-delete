<?php
require_once __DIR__ . '/../controller/loginController.php';
require_once __DIR__ . '/../controller/gerenprodutoController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $usuario = $_POST['usuario'] ?? '';
  $senha = $_POST['senha'] ?? '';
  LoginController::autenticar($usuario, $senha);
}

$atual = "Produto";
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
  <link rel="stylesheet" href="../css/bs-stepper.min.css">
  <link href="../css/style.css" rel="stylesheet">
  <title>Gerenciamento de Produtos - Hotel Winner</title>
  <script src="../js/gerenciamentoScript.js" defer></script>
  <script src="../js/jquery-3.7.1.min.js"></script>
</head>

<body>
  <?php include('navbar.php'); ?>
  <?php include('navgerenc.php'); ?>
  <?php include('modal/modalproduto.php') ?>
  <?php include('modal/modalcancel.php') ?>
  <?php include('modal/modalapagar.php')?>
  <div class="container mt-4">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4> Lista de Produtos
              <a data-bs-toggle="modal" data-bs-target="#addModal" href="#" class="btn btn-primary float-end">Adicionar
                produto</a>
            </h4>
          </div>
          <div class="card-body">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Item</th>
                  <th>Valor</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($produtos as $produto) {
                  ?>
                  <tr>
                    <td><?= $produto['NOME'] ?></td>
                    <td><?= $produto['VALOR'] ?></td>
                     <td>
        <a href="#" class="btn btn-secondary btn-sm" title="Ver">
          <span class="bi-eye-fill"></span>
          <span class="material-symbols-outlined">visibility</span>
        </a>
        <a data-bs-toggle="modal" data-bs-target="#addModal" href="#" class="btn btn-light btn-sm" title="Editar">
          <span class="bi-pencil-fill"></span>
          <span class="material-symbols-outlined">edit</span>
        </a>
        <form action="../controller/deletarProduto.php" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este produto?');" style="display:inline;">
          <input type="hidden" name="id" value="<?= $produto['ID_PRODUTO'] ?>">
          <button type="submit" class="btn btn-danger btn-sm" title="Excluir">
    <span class="material-symbols-outlined">delete</span>
  </button>
        </form>
      </td>
                  </tr>
                  <?php
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</body>