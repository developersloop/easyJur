<form action="<?php $router->storeUser() ?>" method="POST">
    <div class="modal fade" id="cadastraUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cadastrar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="description">Digite o Telefone</label>
                    <input type="text" required class="form-control" id="phone" name="phone">
                </div>
                <div class="form-group">
                    <label for="description">Digite email</label>
                    <input type="email" required class="form-control" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="description">Digite a senha</label>
                    <input type="password" required class="form-control" id="password" name="password">
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

<script>
    $('#phone').mask("(99)9999-99999");
</script>