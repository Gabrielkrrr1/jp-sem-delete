<div class="modal fade" data-bs-backdrop='static' id="addModal" tabindex="-1" aria-labelledby="addModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addModalLabel">Gerenciamento de Quartos</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="../controller/salvarQuarto.php">
        <div class="modal-body">

          <div class="card">
            <div class="card-body ">
              <div class="mb-3 ">
                <label for="numInput" class="form-label">Numeração*</label>
                <input type="number" name="numero" min="0" class="form-control" id="numInput">
              </div>
              <label for="statusInput" class="form-label">Status*</label>
              <select name="status" class="form-select" id="statusInput" required>
                <option selected disabled>Selecione</option>
                <option value="0">Disponível</option>
                <option value="1">Ocupado</option>
              </select>
            </div>
          </div>

          <div class="modal-footer">
            <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button> -->
            <button type="submit" class="btn btn-light">Confirmar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>