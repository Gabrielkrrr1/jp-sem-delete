<nav class="navbar navbar-expand-lg navbar-light bg-light border-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><img id="nav" alt="Hotel Winner" src="../img/winner.png"
                height="70"></a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Gerenciamento
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="gerencliente.php">Cliente</a></li>
                        <li><a class="dropdown-item" href="gerenagend.php">Agendamento</a></li>
                        <li><a class="dropdown-item" href="gerenquarto.php">Quarto</a></li>
                        <li><a class="dropdown-item" href="gerenfunc.php">Funcionário</a></li>
                        <li><a class="dropdown-item" href="gerenproduto.php">Produto</a></li>
                        <li><a class="dropdown-item" href="gerenpatrimonio.php">Patrimônio</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="atendimento.php">Atendimento</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Relatórios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="modal" data-bs-target="#logoutModal" href="#" tabindex="-1" aria-disabled="true">
                        <span class="material-symbols-outlined">logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Modal Logout-->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="logoutModalLabel">Já vai?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Tem certeza que deseja desconectar?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
        <a href="logout.php" class="btn btn-light">Sim</a>
      </div>
    </div>
  </div>
</div>