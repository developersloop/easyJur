<div class="form-login">
    <form class="form" method="POST" action="<?php $router->interceptRequest('login'); ?>">
        <div class="form-group">
            <label for="exampleInputEmail1" class="font-weight-lighter">Digite seu e-mail</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="email">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1" class="font-weight-lighter">Digite sua senha</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password">
        </div>
        <div class="form-group">
            <label class="stretched-link font-weight-lighter" style="color: #007bff">Cadastre-se</label>
        </div>
        <button type="submit" class="btn btn-primary">Acessar</button>
    </form>
</div>
