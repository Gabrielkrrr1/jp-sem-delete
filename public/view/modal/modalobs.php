<?php
if (strlen($table['OBS']) > $length) {
    ?>
    <div class="modal fade" id="modal<?= $j ?>" aria-labelledby="<?= $j ?>ModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="<?= $j ?>ModalLabel">Observações
                        <?php if(isset($table['NOME']))
                        echo " de ". $table['NOME']; ?>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?= $table['OBS'] ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
    <?php
}
$j++;
?>