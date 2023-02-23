
<form action="<?php $schedules->editSchedule($_REQUEST); ?>" method="POST">
    <div class="modal fade" id="editUser-<?php echo $key; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Tarefa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php foreach ($schedules->formatSchedules(array_unique($listSchedules[$key])) as $k => $value): ?>
                    <div class="form-group">
                        <label for="<?= $key ?>"><?= $k == 'description' ? 'Digite sua descrição' : ($k == 'id' ? null : "Digite seu ${k}") ?></label>
                        <input <?= $k == 'id' ? 'hidden' : '' ?> type="text" class="form-control" id="<?= $key ?>" name="<?= $k == 'id' ? 'idd' : $k ?>" value="<?= $value ?>">
                    </div>
                <?php endforeach; ?>
                <input hidden name="edit" value="<?= true ?>" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-success">Editar</button>
            </div>
            </div>
        </div>
    </div>
</form>