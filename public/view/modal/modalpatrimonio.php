<div class="modal fade" data-bs-backdrop='static' id="addModal" tabindex="-1" aria-labelledby="addModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addModalLabel">Gerenciamento de Patrimônios</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="../controller/salvarPatrimonio.php">
        <div class="modal-body">

          <div class="card">
            <div class="card-body">
              <div class="mb-3">
                <label for="nameInput" class="form-label">Nome do Item*</label>
                <input type="text" name="nome" class="form-control" id="nameInput" required>
              </div>
              <div class="mb-3">
                <label for="valorInput" class="form-label">Valor*</label>
                <input type="number" min="0" step="0.01" name="valor" class="form-control" id="valorInput" required>
              </div>
              <div class="mb-3">
                <label for="statusInput" class="form-label">Status*</label>
                <select id="statusInput" name="status" class="form-select" required>
                  <option selected value="1">Utilizado</option>
                  <option value="2">Inutilizado</option>
                  <option value="3">Indisponível</option>
                </select>
              </div>
              <div class="mb-3 col-6">
                <label for="roomInput" class="form-label">Quarto*</label>
                <select id="roomInput" name="id_quarto" class="form-select" required>
                  <option selected disabled>Selecione</option>
                  <option value="1">Não aplica</option>
                  <?php
                  $j = 2;
                  foreach ($rooms as $room) { ?>
                      <option value="<?= $j ?>">Quarto <?= $room['NUMERACAO'] ?></option>
                  <?php
                    $j++;
                  }
                  ?>
                </select>
              </div>
            </div>
          </div>

        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-light">Confirmar</button>
        </div>
      </div>
                </form>
    </div>
  </div>
</div>