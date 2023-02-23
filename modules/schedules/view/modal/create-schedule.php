<form action="<?php $schedules->storeSchedule($_REQUEST); ?>" method="POST">
    <div class="modal fade" id="cadastrarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cadastrar Tarefa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="description">Digite o nome</label>
                    <input type="text" required class="form-control" id="description" name="nome">
                </div>
                <div class="form-group">
                    <label for="description">Digite a descrição</label>
                    <input type="text" required class="form-control" id="description" name="description">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-success">Cadastrar</button>
            </div>
            </div>
        </div>
    </div>
</form>