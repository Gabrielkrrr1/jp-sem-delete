<div class="modal fade" data-bs-backdrop='static' id="addModal" tabindex="-1" aria-labelledby="addModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addModalLabel">Gerenciamento de Funcionários</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="../controller/salvarFuncionario.php">
     <div class="modal-body">
          <div class="card">
            <div class="card-body">
              <div class="mb-3">
                <label for="userInput" class="form-label">Usuário*</label>
                <input type="text" class="form-control" id="userInput" name="usuario" required>
              </div>

              <div class="mb-3">
                <label for="pwInput" class="form-label">Senha*</label>
                <input type="password" class="form-control" id="pwInput" name="senha" required>
              </div>

              <div class="mb-3">
                <label for="pw2Input" class="form-label">Confirmar senha*</label>
                <input type="password" class="form-control" id="pw2Input" name="confirmar_senha" required>
              </div>

              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="nivel_acesso" value="1" id="gerenteInput">
                <label class="form-check-label" for="gerenteInput">
                  Gerente?
                </label>
              </div>
            </div>
          </div>
        </div>

        <div class="modal-footer">
    <button type="submit" class="btn btn-light">Confirmar</button>
        </div>
</form>
      </div>
    </div>
  </div>
</div>