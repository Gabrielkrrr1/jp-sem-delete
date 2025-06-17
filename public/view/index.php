<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
  <link href="../css/style.css" rel="stylesheet">
  <title>Início - Hotel Winner</title>
</head>

<body>
  <?php include('navbar.php'); ?>
  
  <div class="fundo-claro wrapper">
    <br><br>
    
    <img src="../img/winner.png" alt="Hotel Winner" style="margin: auto; margin-top: 3rem; display: block; filter: drop-shadow(1px 1px 7px white);">
    <h1 style="margin:auto; text-align:center; text-shadow: 1px 1px 7px white;"> Bem-vindo(a)! </h1>
    <div class="card" style="display: block; margin: auto; margin-top: 3em; width: 45em;">
      <div class="card-body" style="margin:auto; text-align: center">
        <a href="atendimento.php" class="btn btn-light btn-lg" role="button">Atendimento</a>
        <a href="gerencliente.php" class="btn btn-light btn-lg" role="button">Gerenciamento</a>
        <a href="#" class="btn btn-light btn-lg" role="button">Relatórios</a>
        <a class="btn btn-light btn-lg" role="button" data-bs-toggle="modal" data-bs-target="#logoutModal"><span
            class="material-symbols-outlined">logout</span> Desconectar</a>
      </div>
    </div>
    <br><br>
  </div>
  </nb>

  <?php include('rodape.php'); ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</body>
</html>