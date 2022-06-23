<?php

$alertaLogin = strlen($alertaLogin) ? '<div class="alert alert-danger">'.$alertaLogin.'</div>' : '';
$alertaCadastro = strlen($alertaCadastro) ? '<div class="alert alert-danger">'.$alertaCadastro.'</div>' : '';

?>




<div class="jumbotron text-dark">
    <link rel="stylesheet" href="../index.css">
    <div class="row">

        <div class="col">
            <form method="post">

                <h2>Login</h2>

                <?=$alertaLogin?>

                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" name="nome" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Senha</label>
                        <input type="password" name="senha" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <button type="submit" name="acao" value="logar" class="customBtn">
                            Entrar
                        </button>
                    </div>
            </form>



        </div>
        <div class="col">
        <form method="post">

        <h2>Cadastre-se</h2>

        <?=$alertaCadastro?>

    <div class="form-group">
        <label>Nome</label>
        <input type="text" name="nome" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Senha</label>
        <input type="password" name="senha" class="form-control" required>
    </div>

    <div class="form-group">
        <button type="submit" name="acao" value="cadastrar" class="customBtn">
            Cadastrar
        </button>
    </div>
</form>



        </div>

    </div>





</div>