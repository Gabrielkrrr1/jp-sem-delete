<div class="modal fade" data-bs-backdrop='static' id="addModal" tabindex="-1" aria-labelledby="addModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addModalLabel">Gerenciamento de Cliente</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="../controller/salvarCliente.php">
      <div class="card-body">
    <div class="mb-3">
      <label for="nameInput" class="form-label">Nome completo*</label>
      <input type="text" name="nome" class="form-control" id="nameInput" required>
    </div>
    <div class="mb-3">
      <label for="dateInput" class="form-label">Data de nascimento*</label>
      <input type="date" name="data_nascimento" class="form-control" id="dateInput" required>
    </div>
    <div class="mb-3">
      <label for="payInput" class="form-label">Fiador*</label>
      <input type="text" name="fiador" class="form-control" id="payInput" required>
    </div>
    <div class="mb-3">
      <label for="contInput" class="form-label">Contato*</label>
      <input type="text" name="contato" class="form-control" id="contInput" required>
    </div>
    <div class="mb-3">
      <label for="typeInput" class="form-label">Tipo de documento*</label>
      <select name="tipo_documento" class="form-select" id="typeInput" required>
        <option selected disabled>Selecione</option>
        <option value="RG">RG</option>
        <option value="CPF">CPF</option>
        <option value="Passaporte">Passaporte</option>
      </select>
    </div>
    <div class="mb-3">
      <label for="docInput" class="form-label">Número do Documento*</label>
      <input type="text" name="documento" class="form-control" id="docInput" required>
    </div>
    <div class="mb-3">
      <label for="obsInput" class="form-label">Observações</label>
      <textarea name="obs" class="form-control" id="obsInput" rows="3"></textarea>
    </div>
  </div>
        <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
    <button type="submit" class="btn btn-light">Confirmar</button>
  </div>
      </div>
    </div>
  </div>
  </form>
</div>